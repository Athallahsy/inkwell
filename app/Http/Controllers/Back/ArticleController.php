<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $user = auth()->user(); // Ambil data pengguna yang sedang login

            // Query artikel berdasarkan role
            $articleQuery = Article::with('Category')->latest();

            if ($user->role !== 'admin') {
                // Jika bukan admin, filter artikel berdasarkan user_id
                $articleQuery->where('user_id', $user->id);
            }

            $articles = $articleQuery->get(); // Ambil data artikel

            return DataTables::of($articles)
                // Tambahkan kolom index
                ->addIndexColumn()
                // Tambahkan kolom kategori
                ->addColumn('category_id', function ($article) {
                    return $article->Category->name;
                })
                // Tambahkan kolom status
                ->addColumn('status', function ($article) {
                    if ($article->status == 0) {
                        return '<span class="badge bg-danger">Private</span>';
                    } else {
                        return '<span class="badge bg-success">Public</span>';
                    }
                })
                // Tambahkan kolom aksi
                ->addColumn('action', function ($article) {
                    $user = auth()->user();
                    $buttons = '<div class="text-center">
                                <a href="article/' . $article->id . '" class="btn btn-secondary">Detail</a>';

                    // User biasa hanya bisa edit/delete artikel milik sendiri
                    if ($user->isAdmin() || $article->user_id == $user->id) {
                        $buttons .= ' <a href="article/' . $article->id . '/edit" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="deleteArticle(this)" data-id="' . $article->id . '" class="btn btn-danger">Delete</a>';
                    }

                    $buttons .= '</div>';
                    return $buttons;
                })
                // Render kolom sebagai HTML
                ->rawColumns(['category_id', 'status', 'action'])
                ->make();
        }

        return view('back.article.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.article.create', [
            'categories' => Category::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->validated();

        // Upload dan simpan gambar
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('back', $filename, 'public');
            $data['image'] = $filename;
        }

        // Tambahkan data tambahan
        $data['user_id'] = auth()->user()->id;
        $data['slug'] = Str::slug($data['title']) . '-' . uniqid();
        $data['publish_date'] = now(); // Set publish_date ke tanggal saat ini

        // Simpan data artikel ke database
        Article::create($data);

        return redirect(url('/article'))->with('success', 'Article created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('back.article.show', [
            'article' => Article::with('User', 'Category')->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);

        // User biasa hanya bisa edit artikel milik sendiri
        if (!auth()->user()->isAdmin() && $article->user_id !== auth()->id()) {
            abort(403, 'Anda hanya bisa mengedit artikel milik sendiri.');
        }

        return view('back.article.update', [
            'article' => $article,
            'categories' => Category::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, string $id)
    {
        $article = Article::findOrFail($id);

        // User biasa hanya bisa update artikel milik sendiri
        if (!auth()->user()->isAdmin() && $article->user_id !== auth()->id()) {
            abort(403, 'Anda hanya bisa mengedit artikel milik sendiri.');
        }

        $data = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('back', $filename, 'public');

            // unlink image/delete old image
            Storage::disk('public')->delete('back/'.$request->old_image);

            $data['image'] = $filename;
        } else {
            $data['image'] = $request->old_image;
        }


        $data['user_id'] = auth()->user()->id;
        $data['slug'] = Str::slug($data['title']) . '-' . uniqid();

        $article->update($data);

        return redirect(url('/article'))->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Article::find($id);

        if ($data) {
            // User biasa hanya bisa hapus artikel milik sendiri
            if (!auth()->user()->isAdmin() && $data->user_id !== auth()->id()) {
                return response()->json([
                    'message' => 'Anda hanya bisa menghapus artikel milik sendiri.'
                ], 403);
            }

            // Periksa apakah gambar terkait ada sebelum menghapus
            if ($data->image && Storage::disk('public')->exists('back/' . $data->image)) {
                // Menghapus gambar dari penyimpanan
                Storage::disk('public')->delete('back/' . $data->image);
            }

            // Menghapus artikel dari database
            $data->delete();

            // Mengembalikan respons sukses
            return response()->json([
                'message' => 'Article deleted successfully'
            ]);
        }

        // Jika artikel tidak ditemukan
        return response()->json([
            'message' => 'Article not found'
        ], 404);
    }

}

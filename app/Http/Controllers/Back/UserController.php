<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
         // Ambil data pengguna, urutkan admin di atas, lalu urutkan berdasarkan ID
         $users = User::when(!auth()->user()->isAdmin(), function ($query) {
            // Jika bukan admin, filter berdasarkan id pengguna yang sedang login
            return $query->where('id', auth()->user()->id);
        })
        ->orderByRaw("role = 'admin' DESC")  // Prioritaskan admin di urutan atas
        ->orderBy('id', 'asc')               // Urutkan pengguna lainnya berdasarkan ID
        ->get();

        // Kembalikan data ke view
        return view('back.users.index', compact('users'));

    }

    public function store(UserRequest $request)
    {
        // Hanya admin yang bisa membuat user baru (sudah dilindungi middleware, tapi double check)
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Akses ditolak.');
        }

        // Data yang sudah tervalidasi dari UserRequest
        $data = $request->validated();

        // Enkripsi password
        $data['password'] = bcrypt($data['password']);

        // Simpan pengguna ke database, termasuk role
        User::create($data);

        // Redirect dengan pesan sukses
        return back()->with('success', 'User created successfully');
    }


    public function update(UserUpdateRequest $request, $id)
    {
        // User biasa hanya bisa edit profil sendiri
        if (!auth()->user()->isAdmin() && auth()->user()->id != $id) {
            abort(403, 'Anda hanya bisa mengedit profil sendiri.');
        }

        $data = $request->validated();

        // User biasa tidak boleh mengubah role
        if (!auth()->user()->isAdmin()) {
            unset($data['role']);
        }

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
            User::find($id)->update($data);
        } else {
            unset($data['password']);
            User::find($id)->update($data);
        }

        return back()->with('success', 'User updated successfully');
    }

        public function destroy(string $id)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Akses ditolak.');
        }

        if (auth()->user()->id == $id) {
            return back()->with('error', 'Anda tidak bisa menghapus akun sendiri.');
        }

        $user = User::findOrFail($id);

        foreach ($user->articles as $article) {
            if ($article->image && Storage::disk('public')->exists('back/' . $article->image)) {
                Storage::disk('public')->delete('back/' . $article->image);
            }
            $article->delete();
        }

        $user->delete();
        return back()->with('success', 'User deleted successfully');
    }
}


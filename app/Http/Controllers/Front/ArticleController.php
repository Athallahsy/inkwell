<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
        public function index(){
            $search = request()->search;

        if ($search) {
            $articles = Article::with('Category')->whereStatus(1)->where('title', 'like', '%'.$search.'%')->latest()->paginate(9);
        } else {
            $articles = Article::with('Category')->whereStatus(1)->latest()->paginate(9);
        }

        return view('front.article.index', [
            'articles' => $articles,
            'search' => $search
        ]);
    }
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        // Periksa apakah artikel sudah pernah dilihat dalam sesi ini
        $viewedArticles = session()->get('viewed_articles', []); // Ambil daftar artikel yang sudah dilihat

        if (!in_array($article->id, $viewedArticles)) {
            // Jika artikel belum ada di daftar, tambahkan views
            $article->increment('views');

            // Simpan ID artikel ke dalam sesi
            session()->push('viewed_articles', $article->id);
        }

        return view('front.article.show', [
            'article' => $article,
        ]);
    }

}

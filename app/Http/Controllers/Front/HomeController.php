<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $latest_article = Article::with(['Category', 'User'])->whereStatus(1)->latest()->first();
        $articles = Article::with(['Category', 'User'])->whereStatus(1)->latest()->paginate(6);

        return view('front.home.index', compact('latest_article', 'articles'));
    }

    public function about()
    {
        return view('front.home.about');
    }
}

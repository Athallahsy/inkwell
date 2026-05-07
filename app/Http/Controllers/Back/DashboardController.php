<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    // Mengambil data yang diperlukan
    $categories = Category::withCount('articles')->get();
    $total_articles = Article::count();
    $total_categories = Category::count();
    $latest_articles = Article::with('Category')->whereStatus(1)->latest()->take(5)->get();
    $popular_articles = Article::with('Category')->whereStatus(1)->orderBy('views', 'desc')->take(5)->get();

    // Mengirimkan data ke view
    return view('back.dashboard.index', compact(
        'categories',
        'total_articles',
        'total_categories',
        'latest_articles',
        'popular_articles'
    ));
}

}

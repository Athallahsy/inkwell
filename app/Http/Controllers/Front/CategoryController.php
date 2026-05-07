<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;



class CategoryController extends Controller
{
    public function index($slug)
    {
        return view('front.category.index', [
            'articles' => Article::whereStatus(1)->with('Category')->whereHas('Category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->latest()->paginate(4),
            'category' => $slug
        ]);
    }
}

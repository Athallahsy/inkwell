<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Category;
use App\Models\Article;

class SideWidgetProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('front.layout.side-widget', function ($view) {
            // $category = Category::latest()->get();
            $category  = Category::whereHas('Articles', function (Builder $query) {
                $query->where('status', 1);
            })->latest()->get();

            $view->with('categories', $category);
        });

        View::composer('front.layout.side-widget', function ($view) {
           $articles = Article::whereStatus(1)->orderBy('views', 'desc')->limit(3)->get();

            $view->with('popular_articles', $articles);
        });
    }
}

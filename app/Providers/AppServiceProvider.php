<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Product;
use App\Observers\GenericObserver;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         //partials._pages_menu
         View::composer('partials._pages_menu', function ($view) {
            $pages = Page::whereNull('parent_page_id')->with('sub_pages')->orderBy('sort_order', 'ASC')->get();
            $view->with('pages', $pages);
        });

        // mode observers
        Product::observe(GenericObserver::class);

    }
}

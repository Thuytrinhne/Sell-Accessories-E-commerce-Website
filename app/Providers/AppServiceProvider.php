<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryInterface::class, CategoryRespository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
 
        {
            $topCategories = Category::whereNull('parent_id')->get();
            view()->share('topCategories', $topCategories);
        }

             Paginator::useBootstrap();
           

    }
}

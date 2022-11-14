<?php

namespace App\Providers;

use App\Models\DanhMuc;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $Category = new DanhMuc();
        $Product = new Product();
        $CategoryClient = $Category->getDanhMuc();
        $ExitProductCategory = [];
        foreach($CategoryClient as $key => $item){
            if(count($Product->getProductInCategory($item->MaDM,null))>0) $ExitProductCategory[] = $item->MaDM;
        }
        View::share('Category',$CategoryClient);
        View::share('ExitProductInCategory',$ExitProductCategory);
    }
}

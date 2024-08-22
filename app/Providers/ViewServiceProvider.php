<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\SidebarItem;
use App\Models\ListSidebar;

use Illuminate\Support\Facades\View;
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $list = ListSidebar::pluck('name')->toArray();
        $viewsArray = array_map('trim', $list);
        View::composer(
            $viewsArray,
            function ($view) {
                $sidebarItems = SidebarItem::orderBy('created_at', 'desc')->get();
                $view->with('sidebarItems', $sidebarItems);
            }
        );
    }
}

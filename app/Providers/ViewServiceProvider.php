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

        $viewsArray = array_map('trim', $list); // Limpiar cualquier espacio adicional

        View::composer(
            $viewsArray, // Usa el array de vistas
            function ($view) {
                $sidebarItems = SidebarItem::all(); // Obtén los datos que deseas pasar a la vista
                $view->with('sidebarItems', $sidebarItems); // Inyecta los datos en la vista
            }
        );
    }
}

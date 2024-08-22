<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\SidebarItem;
use App\Models\ListSidebar;
use Illuminate\Database\QueryException;
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
        try {
            // Verificar si la tabla list_sidebar existe
            if (Schema::hasTable('list_sidebar')) {
                $list = ListSidebar::pluck('name')->toArray();
                $viewsArray = array_map('trim', $list);
                if (count($viewsArray) > 0) {
                    View::composer($viewsArray, function ($view) {
                        $sidebarItems = SidebarItem::all();
                        $view->with('sidebarItems', $sidebarItems);
                    });
                } else {

                    // Si la tabla no tiene vistas registradas, compartir con todas las vistas
                    View::share('sidebarItems', SidebarItem::all());
                }
            } else {
                // Si la tabla no existe, compartir un array vacío
                View::share('sidebarItems', []);
            }
        } catch (QueryException $e) {
            // Manejo de excepciones de la consulta
            View::share('sidebarItems', []);
        }
    }
}

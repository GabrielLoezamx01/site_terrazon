<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class item_list_sidebar extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Items 22-08-2024 nuevos items de las columnas....
        DB::table('sidebar_items')->where('name', 'Propiedades')->update(['link' => 'dropdown']);
        $items = [
            [
                'name' => 'Crear Usuario',
                'svg' => 'usuario.svg',
                'link' => 'admin/users',
                'parent_id' => 2,
            ],
            [
                'name' => 'Lista De Propiedades',
                'svg' => '',
                'link' => 'admin/users/list',
                'parent_id' => 2,
            ],
            [
                'name' => 'Nueva Propiedad',
                'svg' => '',
                'link' => 'admin/new_property',
                'parent_id' => 3
            ],
            [
                'name' => 'Lista de Propiedades',
                'svg' => '',
                'link' => 'admin/property',
                'parent_id' => 3
            ]
        ];
        DB::table('sidebar_items')->insert($items);
    }
}

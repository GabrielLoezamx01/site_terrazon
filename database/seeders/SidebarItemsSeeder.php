<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SidebarItemsSeeder extends Seeder
{
    public function run()
    {

        $parents = [
            [
                'id' => 1,
                'name' => 'Home',
                'svg' => 'home.svg',
                'link' => 'admin/home',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'id' => 2,
                'name' => 'Usuarios',
                'svg' => 'usuario.svg',
                'link' => 'admin/users',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'id' => 3,
                'name' => 'Propiedades',
                'svg' => 'propiedades.svg',
                'link' => 'admin/property',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'id' => 4,
                'name' => 'Características',
                'svg' => 'características.svg',
                'link' => 'dropdown',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'id' => 5,
                'name' => 'Ventas',
                'svg' => 'propiedades.svg',
                'link' => 'admin/process',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => null,
            ]
        ];

        $childs = [
            [
                'id' => 6,
                'name' => 'Amenidades',
                'svg' => 'amenidades.svg',
                'link' => 'admin/amenities',
                'parent_id' => 5,
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'id' => 7,
                'name' => 'Tipos',
                'svg' => 'tipos.svg',
                'link' => 'admin/types',
                'parent_id' => 5,
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'id' => 8,
                'name' => 'Características',
                'svg' => 'características.svg',
                'link' => 'admin/features',
                'parent_id' => 5,
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'id' => 9,
                'name' => 'Condición',
                'svg' => 'condicion.svg',
                'link' => 'admin/condition',
                'parent_id' => 5,
                'created_at' => now(),
                'updated_at' => null,
            ]
        ];
        foreach ($parents as $item) {
            DB::table('sidebar_items')->updateOrInsert(['id' => $item['id']], $item);
        }
        foreach ($childs as $item) {
            DB::table('sidebar_items')->updateOrInsert(['id' => $item['id']], $item);
        }
    }
}

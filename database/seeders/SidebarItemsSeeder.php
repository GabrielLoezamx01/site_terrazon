<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SidebarItemsSeeder extends Seeder
{
    public function run()
    {
        $items = [
            [
                'id' => 1,
                'name' => 'Home',
                'svg' => 'home.svg',
                'link' => 'admin/home',
                'parent_id' => null,
                'created_at' => '2024-08-09 03:15:23',
                'updated_at' => null,
            ],
            [
                'id' => 2,
                'name' => 'Usuarios',
                'svg' => 'usuario.svg',
                'link' => 'admin/users',
                'parent_id' => null,
                'created_at' => '2024-08-09 03:15:54',
                'updated_at' => null,
            ],
            [
                'id' => 3,
                'name' => 'Amenidades',
                'svg' => 'amenidades.svg',
                'link' => 'admin/amenities',
                'parent_id' => 9,
                'created_at' => '2024-08-09 03:18:47',
                'updated_at' => null,
            ],
            [
                'id' => 4,
                'name' => 'Tipos',
                'svg' => 'tipos.svg',
                'link' => 'admin/types',
                'parent_id' => 9,
                'created_at' => '2024-08-09 03:18:50',
                'updated_at' => null,
            ],
            [
                'id' => 5,
                'name' => 'Características',
                'svg' => 'características.svg',
                'link' => 'admin/features',
                'parent_id' => 9,
                'created_at' => '2024-08-09 03:18:50',
                'updated_at' => null,
            ],
            [
                'id' => 6,
                'name' => 'Condición',
                'svg' => 'condicion.svg',
                'link' => 'admin/condition',
                'parent_id' => 9,
                'created_at' => '2024-08-09 03:18:50',
                'updated_at' => null,
            ],
            [
                'id' => 7,
                'name' => 'Propiedades',
                'svg' => 'propiedades.svg',
                'link' => 'admin/property',
                'parent_id' => null,
                'created_at' => '2024-08-09 03:47:01',
                'updated_at' => null,
            ],
            [
                'id' => 8,
                'name' => 'Características',
                'svg' => 'características.svg',
                'link' => 'dropdown',
                'parent_id' => null,
                'created_at' => '2024-08-09 04:06:22',
                'updated_at' => null,
            ],
            [
                'id' => 9,
                'name' => 'Ventas',
                'svg' => 'propiedades.svg',
                'link' => 'admin/process',
                'parent_id' => null,
                'created_at' => '2024-08-09 04:22:24',
                'updated_at' => null,
            ],
        ];

        foreach ($items as $item) {
            DB::table('sidebar_items')->updateOrInsert(
                ['id' => $item['id']],
            );
        }

    }
}

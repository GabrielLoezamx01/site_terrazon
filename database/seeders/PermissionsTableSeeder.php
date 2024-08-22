<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['id' => 1, 'name' => 'admin.contacts.index', 'created_at' => null, 'updated_at' => null],
            ['id' => 2, 'name' => 'admin.home.index', 'created_at' => null, 'updated_at' => null],
            ['id' => 3, 'name' => 'admin.properties.users', 'created_at' => null, 'updated_at' => null],
            ['id' => 4, 'name' => 'admin.users', 'created_at' => null, 'updated_at' => null],
            ['id' => 5, 'name' => 'admin.users.index', 'created_at' => null, 'updated_at' => null],
            ['id' => 6, 'name' => 'admin.properties.types', 'created_at' => null, 'updated_at' => null],
            ['id' => 7, 'name' => 'admin.properties.features', 'created_at' => null, 'updated_at' => null],
            ['id' => 8, 'name' => 'admin.properties.list', 'created_at' => null, 'updated_at' => null],
            ['id' => 9, 'name' => 'admin.properties.gallery', 'created_at' => null, 'updated_at' => null],
            ['id' => 10, 'name' => 'admin.properties.edit', 'created_at' => null, 'updated_at' => null],
            ['id' => 11, 'name' => 'admin.properties.details', 'created_at' => null, 'updated_at' => null],
            ['id' => 12, 'name' => 'admin.properties.create', 'created_at' => null, 'updated_at' => null],
            ['id' => 13, 'name' => 'admin.properties.condition', 'created_at' => null, 'updated_at' => null],
            ['id' => 14, 'name' => 'admin.properties.amenities', 'created_at' => null, 'updated_at' => null],
            ['id' => 15, 'name' => 'admin.properties.create.amenities', 'created_at' => null, 'updated_at' => null],
            ['id' => 16, 'name' => 'admin.properties.create.condition', 'created_at' => null, 'updated_at' => null],
            ['id' => 17, 'name' => 'admin.properties.create.details', 'created_at' => null, 'updated_at' => null],
            ['id' => 18, 'name' => 'admin.properties.create.feature', 'created_at' => null, 'updated_at' => null],
            ['id' => 19, 'name' => 'admin.properties.create.location', 'created_at' => null, 'updated_at' => null],
            ['id' => 20, 'name' => 'admin.properties.create.information', 'created_at' => null, 'updated_at' => null],
            ['id' => 21, 'name' => 'admin.properties.create.types', 'created_at' => null, 'updated_at' => null],
            ['id' => 22, 'name' => 'auth.profile', 'created_at' => null, 'updated_at' => null],
        ];

        DB::table('list_sidebar')->insert($permissions);
    }
}

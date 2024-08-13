<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SuperadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'admin',
                'email' => 'arq.giogalgo@gmail.com',
                'password' => bcrypt('password123'),
            ],
            [
                'name' => 'admin',
                'email' => 'angelpoot_adm@outlook.com',
                'password' => bcrypt('password123'),
            ],
            [
                'name' => 'admin',
                'email' => 'alexrc.design@gmail.com',
                'password' => bcrypt('password123'),
            ],
            [
                'name' => 'dev',
                'email' => 'gabriel26loeza04@gmail.com',
                'password' => bcrypt('password123'),
            ],
            [
                'name' => 'dev',
                'email' => 'gbetus@gmail.com',
                'password' => bcrypt('password123'),
            ],
        ]);

    }
}

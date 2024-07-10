<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $result = User::updateOrCreate([
            'id' => 1
        ], [
            'id' => 1,
            'name' => 'sysadmin',
            'email' => 'imir.aguilar.salazar@gmail.com',
            'password' => 'Terr2024#'
        ]);
    }
}

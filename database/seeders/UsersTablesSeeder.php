<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name'              =>  'Nica Gabutan',
            'email'             =>  'nicagabs7@gmail.com',
            'password'          =>  'password'
        //    'remember_token'    =>  str_random(10)
        ]);
    }
}

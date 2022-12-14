<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'role_id'=>'1',
            'name'=>'Admin',
            'username'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin@gmail.com'),
        ]);

        User::updateOrCreate([
            'role_id'=>'2',
            'name'=>'Author2',
            'username'=>'author2',
            'email'=>'author2@gmail.com',
            'password'=>bcrypt('author2@gmail.com'),
        ]);
    }
}

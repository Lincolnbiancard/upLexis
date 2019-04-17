<?php

use Illuminate\Database\Seeder;


class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert(
            
                [
                    'name'      => 'admin',
                    'password' => env('PASSWORD_HASH') ? bcrypt('admin') : 'admin',
                    'email' => 'admin@admin.com.br',
                ]);
    }
}

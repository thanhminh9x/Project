<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'role' => '1',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'avatar'=> ''
            ],
            [
                'name' => 'Minh',
                'role' => '2',
                'email' => 'Minh@gmail.com',
                'password' => bcrypt('admin123'),
                'avatar'=> ''
            ],
            ]);
    }
}

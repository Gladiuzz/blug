<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('Admin1234'),
                'role' => 'Admin',
                'avatar' => 'profile_small.jpg',
            ],
        ];


        DB::table('users')->insert($data);
        DB::table('user_detail')->insert([
            'user_id' => $data[0]['id'],
            'job' => 'Admin',
            'description' => 'Admin Description'
        ]);
    }
}

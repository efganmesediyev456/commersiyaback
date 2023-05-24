<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name'       => env('ADMIN_USERNAME','SAFAROFF'),
            'email'      => env('ADMIN_EMAIL','safaroff@gmail.com'),
            'password'   => Hash::make(env('ADMIN_PASSWORD','Parol123#')),
            'is_admin'   => 1,
            'status'     => 1,
        ]);
    }
}

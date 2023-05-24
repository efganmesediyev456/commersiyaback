<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'template' => 'home',
            'slug'     => '/',
            'ordering' => 1,
            'status'   => 1,

        ]);

        DB::table('page_translations')->insert([
            'page_id' => 1,
            'title'     => 'Ana səhifə',
            'locale' => config('app.locale'),


        ]);
    }
}

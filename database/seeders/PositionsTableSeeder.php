<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('positions')->delete();
        
        \DB::table('positions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'icon' => '/storage/vacancy/xlA68xYPxSF4YMwCpb8R2wToVWQy46hrwsAGQrvL.svg',
                'status' => 1,
                'created_at' => '2022-03-30 16:19:43',
                'updated_at' => '2022-10-19 16:02:33',
                'ordering' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'icon' => '/storage/vacancy/TKKd24Pgs9qjRMc6NLF0CA87STVbQYg5hYz6n28F.svg',
                'status' => 1,
                'created_at' => '2022-03-30 16:30:35',
                'updated_at' => '2022-03-30 16:30:35',
                'ordering' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'icon' => '/storage/vacancy/DdufgwstzizFJJkXRiHoaQ4LXbOWV1Vtw1Jl7aKP.svg',
                'status' => 1,
                'created_at' => '2022-03-30 16:30:56',
                'updated_at' => '2022-03-30 16:30:56',
                'ordering' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'icon' => '/storage/vacancy/4BSy7F3wIhX1jluVKlmljVudx5E0xuK6Otyg8gUd.svg',
                'status' => 1,
                'created_at' => '2022-03-30 16:31:14',
                'updated_at' => '2022-03-30 16:31:14',
                'ordering' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'icon' => '/storage/vacancy/ehgIi25PLXcqIPRD0vuTyoXOf8xF0fTKr8wddo9r.svg',
                'status' => 1,
                'created_at' => '2022-03-30 16:31:35',
                'updated_at' => '2022-03-30 16:31:35',
                'ordering' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'icon' => '/storage/vacancy/kxQvEOvbfboJZwV1lF43BvyWZGjuFywG8lmW9Dvr.svg',
                'status' => 1,
                'created_at' => '2022-03-30 16:31:56',
                'updated_at' => '2022-03-30 16:31:56',
                'ordering' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'icon' => '/storage/vacancy/wU9JMxu4iI7vG3fhY4u5ghVlWzY9C6xWrixurFGL.svg',
                'status' => 1,
                'created_at' => '2022-03-30 16:32:19',
                'updated_at' => '2022-03-30 16:32:19',
                'ordering' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'icon' => '/storage/vacancy/Q81Vd9DG5Q2eueckQ9JcscARa9HhwHL2ZJGRIUNM.svg',
                'status' => 1,
                'created_at' => '2022-03-30 16:32:37',
                'updated_at' => '2022-10-19 16:02:26',
                'ordering' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'icon' => '/storage/vacancy/G5NI7oQZZxywo7LMhflsy29gvB22BXUOgkfBn7aU.svg',
                'status' => 1,
                'created_at' => '2022-03-30 16:32:57',
                'updated_at' => '2022-10-19 16:02:21',
                'ordering' => 1,
            ),
        ));
        
        
    }
}
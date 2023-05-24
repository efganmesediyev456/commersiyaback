<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu_translations')->delete();
        
        \DB::table('menu_translations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'menu_id' => 1,
                'title' => 'Əsas Menyu',
                'locale' => 'az',
            ),
            1 => 
            array (
                'id' => 2,
                'menu_id' => 1,
                'title' => NULL,
                'locale' => 'en',
            ),
            2 => 
            array (
                'id' => 3,
                'menu_id' => 2,
                'title' => 'Hamburger Menyu',
                'locale' => 'az',
            ),
            3 => 
            array (
                'id' => 4,
                'menu_id' => 2,
                'title' => NULL,
                'locale' => 'en',
            ),
            4 => 
            array (
                'id' => 5,
                'menu_id' => 2,
                'title' => NULL,
                'locale' => 'ru',
            ),
            5 => 
            array (
                'id' => 6,
                'menu_id' => 1,
                'title' => NULL,
                'locale' => 'ru',
            ),
        ));
        
        
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'slug' => 'general',
                'status' => 1,
                'ordering' => 1,
                'created_at' => '2022-02-21 10:49:19',
                'updated_at' => '2022-02-21 10:49:19',
            ),
            1 => 
            array (
                'id' => 2,
                'slug' => 'dropdown',
                'status' => 1,
                'ordering' => 2,
                'created_at' => '2022-02-21 10:50:58',
                'updated_at' => '2022-02-21 10:50:58',
            ),
        ));
        
        
    }
}
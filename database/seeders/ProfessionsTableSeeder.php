<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProfessionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('professions')->delete();
        
        \DB::table('professions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'position_id' => 1,
                'icon' => NULL,
                'status' => 1,
                'created_at' => '2022-03-30 16:35:36',
                'updated_at' => '2022-09-16 12:36:20',
                'ordering' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'position_id' => 2,
                'icon' => NULL,
                'status' => 1,
                'created_at' => '2022-03-30 16:36:14',
                'updated_at' => '2022-03-30 16:36:14',
                'ordering' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'position_id' => 3,
                'icon' => NULL,
                'status' => 1,
                'created_at' => '2022-03-30 16:36:46',
                'updated_at' => '2022-03-30 16:36:46',
                'ordering' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'position_id' => 4,
                'icon' => NULL,
                'status' => 1,
                'created_at' => '2022-03-30 16:37:10',
                'updated_at' => '2022-03-30 16:37:10',
                'ordering' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'position_id' => 5,
                'icon' => NULL,
                'status' => 1,
                'created_at' => '2022-03-30 16:37:39',
                'updated_at' => '2022-03-30 16:37:39',
                'ordering' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'position_id' => 6,
                'icon' => NULL,
                'status' => 1,
                'created_at' => '2022-03-30 16:38:04',
                'updated_at' => '2022-03-30 16:38:04',
                'ordering' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'position_id' => 7,
                'icon' => NULL,
                'status' => 1,
                'created_at' => '2022-03-30 16:38:36',
                'updated_at' => '2022-03-30 16:38:36',
                'ordering' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'position_id' => 8,
                'icon' => NULL,
                'status' => 1,
                'created_at' => '2022-03-30 16:38:58',
                'updated_at' => '2022-03-30 16:38:58',
                'ordering' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'position_id' => 9,
                'icon' => NULL,
                'status' => 1,
                'created_at' => '2022-03-30 16:39:21',
                'updated_at' => '2022-10-19 16:21:44',
                'ordering' => 1,
            ),
            9 => 
            array (
                'id' => 27,
                'position_id' => 1,
                'icon' => NULL,
                'status' => 1,
                'created_at' => '2022-10-20 17:52:46',
                'updated_at' => '2022-10-20 17:52:46',
                'ordering' => 1,
            ),
        ));
        
        
    }
}
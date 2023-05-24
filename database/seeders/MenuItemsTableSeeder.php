<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu_items')->delete();
        
        \DB::table('menu_items')->insert(array (
            0 => 
            array (
                'id' => 13,
                'parent_id' => NULL,
                'menu_id' => 2,
                'model' => NULL,
                'model_record_id' => NULL,
                'ordering' => 4,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2022-02-22 11:46:33',
                'updated_at' => '2022-10-19 15:34:48',
            ),
            1 => 
            array (
                'id' => 58,
                'parent_id' => NULL,
                'menu_id' => 2,
                'model' => NULL,
                'model_record_id' => NULL,
                'ordering' => 9,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2022-03-17 14:23:54',
                'updated_at' => '2022-10-19 15:34:48',
            ),
            2 => 
            array (
                'id' => 92,
                'parent_id' => 1,
                'menu_id' => 1,
                'model' => NULL,
                'model_record_id' => NULL,
                'ordering' => 1,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2022-06-22 13:50:10',
                'updated_at' => '2022-10-11 17:42:15',
            ),
            3 => 
            array (
                'id' => 122,
                'parent_id' => 58,
                'menu_id' => 2,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 1,
                'ordering' => 14,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2022-11-18 10:28:38',
                'updated_at' => '2022-11-18 10:28:38',
            ),
            4 => 
            array (
                'id' => 123,
                'parent_id' => NULL,
                'menu_id' => 1,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 379,
                'ordering' => 1,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2023-03-31 12:07:05',
                'updated_at' => '2023-03-31 12:10:49',
            ),
            5 => 
            array (
                'id' => 124,
                'parent_id' => 123,
                'menu_id' => 1,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 380,
                'ordering' => 1,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2023-03-31 12:07:28',
                'updated_at' => '2023-03-31 12:10:49',
            ),
            6 => 
            array (
                'id' => 125,
                'parent_id' => 123,
                'menu_id' => 1,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 381,
                'ordering' => 2,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2023-03-31 12:08:04',
                'updated_at' => '2023-03-31 12:10:49',
            ),
            7 => 
            array (
                'id' => 126,
                'parent_id' => 123,
                'menu_id' => 1,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 382,
                'ordering' => 3,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2023-03-31 12:08:16',
                'updated_at' => '2023-03-31 12:10:49',
            ),
            8 => 
            array (
                'id' => 127,
                'parent_id' => 123,
                'menu_id' => 1,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 383,
                'ordering' => 4,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2023-03-31 12:09:09',
                'updated_at' => '2023-03-31 12:10:49',
            ),
            9 => 
            array (
                'id' => 128,
                'parent_id' => 123,
                'menu_id' => 1,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 392,
                'ordering' => 5,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2023-03-31 12:09:30',
                'updated_at' => '2023-03-31 12:10:49',
            ),
            10 => 
            array (
                'id' => 129,
                'parent_id' => NULL,
                'menu_id' => 1,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 393,
                'ordering' => 2,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2023-03-31 12:10:11',
                'updated_at' => '2023-03-31 12:10:49',
            ),
            11 => 
            array (
                'id' => 130,
                'parent_id' => 129,
                'menu_id' => 1,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 394,
                'ordering' => 1,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2023-03-31 12:12:35',
                'updated_at' => '2023-03-31 12:12:35',
            ),
            12 => 
            array (
                'id' => 131,
                'parent_id' => 129,
                'menu_id' => 1,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 395,
                'ordering' => 2,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2023-03-31 12:12:51',
                'updated_at' => '2023-03-31 12:12:51',
            ),
            13 => 
            array (
                'id' => 132,
                'parent_id' => NULL,
                'menu_id' => 1,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 396,
                'ordering' => 3,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2023-03-31 12:13:05',
                'updated_at' => '2023-03-31 12:13:05',
            ),
            14 => 
            array (
                'id' => 133,
                'parent_id' => 132,
                'menu_id' => 1,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 397,
                'ordering' => 1,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2023-03-31 12:13:27',
                'updated_at' => '2023-03-31 12:13:27',
            ),
            15 => 
            array (
                'id' => 134,
                'parent_id' => NULL,
                'menu_id' => 1,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 410,
                'ordering' => 4,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2023-03-31 12:14:27',
                'updated_at' => '2023-03-31 12:14:27',
            ),
            16 => 
            array (
                'id' => 135,
                'parent_id' => NULL,
                'menu_id' => 1,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 398,
                'ordering' => 5,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2023-03-31 12:15:44',
                'updated_at' => '2023-03-31 12:15:44',
            ),
            17 => 
            array (
                'id' => 136,
                'parent_id' => 135,
                'menu_id' => 1,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 399,
                'ordering' => 1,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2023-03-31 12:16:07',
                'updated_at' => '2023-03-31 12:16:07',
            ),
            18 => 
            array (
                'id' => 137,
                'parent_id' => 135,
                'menu_id' => 1,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 400,
                'ordering' => 2,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2023-03-31 12:16:19',
                'updated_at' => '2023-03-31 12:16:19',
            ),
            19 => 
            array (
                'id' => 138,
                'parent_id' => NULL,
                'menu_id' => 1,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 401,
                'ordering' => 6,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2023-03-31 12:16:41',
                'updated_at' => '2023-03-31 12:16:41',
            ),
            20 => 
            array (
                'id' => 139,
                'parent_id' => 138,
                'menu_id' => 1,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 402,
                'ordering' => 1,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2023-03-31 12:17:07',
                'updated_at' => '2023-03-31 12:17:07',
            ),
            21 => 
            array (
                'id' => 140,
                'parent_id' => 138,
                'menu_id' => 1,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 403,
                'ordering' => 2,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2023-03-31 12:17:18',
                'updated_at' => '2023-03-31 12:17:18',
            ),
            22 => 
            array (
                'id' => 141,
                'parent_id' => 138,
                'menu_id' => 1,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 404,
                'ordering' => 3,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2023-03-31 12:17:34',
                'updated_at' => '2023-03-31 12:17:34',
            ),
            23 => 
            array (
                'id' => 142,
                'parent_id' => 138,
                'menu_id' => 1,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 405,
                'ordering' => 4,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2023-03-31 12:18:33',
                'updated_at' => '2023-03-31 12:18:33',
            ),
            24 => 
            array (
                'id' => 143,
                'parent_id' => 138,
                'menu_id' => 1,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 406,
                'ordering' => 5,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2023-03-31 12:18:45',
                'updated_at' => '2023-03-31 12:18:45',
            ),
            25 => 
            array (
                'id' => 144,
                'parent_id' => 138,
                'menu_id' => 1,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 407,
                'ordering' => 6,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2023-03-31 12:18:56',
                'updated_at' => '2023-03-31 12:18:56',
            ),
            26 => 
            array (
                'id' => 145,
                'parent_id' => 138,
                'menu_id' => 1,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 408,
                'ordering' => 7,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2023-03-31 12:19:10',
                'updated_at' => '2023-03-31 12:19:10',
            ),
            27 => 
            array (
                'id' => 146,
                'parent_id' => 138,
                'menu_id' => 1,
                'model' => 'App\\Models\\Atom\\Page',
                'model_record_id' => 409,
                'ordering' => 8,
                'status' => 1,
                'on_blank' => 0,
                'created_at' => '2023-03-31 12:19:22',
                'updated_at' => '2023-03-31 12:19:22',
            ),
        ));
        
        
    }
}
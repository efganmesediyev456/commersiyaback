<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'superadmin',
                'description' => NULL,
                'created_at' => '2022-08-24 09:51:37',
                'updated_at' => '2022-08-24 09:51:37',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'admin',
                'description' => 'admin',
                'created_at' => '2022-08-25 12:57:52',
                'updated_at' => '2022-08-25 12:57:52',
            ),
        ));
        
        
    }
}
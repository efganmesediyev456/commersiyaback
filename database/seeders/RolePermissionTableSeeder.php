<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolePermissionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_permission')->delete();
        
        \DB::table('role_permission')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'permission_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 4,
                'role_id' => 1,
                'permission_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 5,
                'role_id' => 1,
                'permission_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 6,
                'role_id' => 1,
                'permission_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 7,
                'role_id' => 1,
                'permission_id' => 24,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 8,
                'role_id' => 1,
                'permission_id' => 27,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 11,
                'role_id' => 1,
                'permission_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 12,
                'role_id' => 1,
                'permission_id' => 29,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 13,
                'role_id' => 1,
                'permission_id' => 30,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 14,
                'role_id' => 1,
                'permission_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 15,
                'role_id' => 1,
                'permission_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 16,
                'role_id' => 1,
                'permission_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 17,
                'role_id' => 1,
                'permission_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 18,
                'role_id' => 1,
                'permission_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 19,
                'role_id' => 1,
                'permission_id' => 26,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 20,
                'role_id' => 1,
                'permission_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 21,
                'role_id' => 1,
                'permission_id' => 25,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 22,
                'role_id' => 1,
                'permission_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 23,
                'role_id' => 1,
                'permission_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 24,
                'role_id' => 1,
                'permission_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 25,
                'role_id' => 1,
                'permission_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 26,
                'role_id' => 1,
                'permission_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 27,
                'role_id' => 1,
                'permission_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 28,
                'role_id' => 1,
                'permission_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 29,
                'role_id' => 1,
                'permission_id' => 32,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 30,
                'role_id' => 1,
                'permission_id' => 33,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 31,
                'role_id' => 1,
                'permission_id' => 31,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 32,
                'role_id' => 1,
                'permission_id' => 34,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 33,
                'role_id' => 1,
                'permission_id' => 35,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
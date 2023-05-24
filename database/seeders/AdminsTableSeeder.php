<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => NULL,
                'name' => 'Akif Ismayilov',
                'email' => 'akif@safaroff.az',
                'password' => '$argon2id$v=19$m=65536,t=4,p=1$a0F2RndwdTFUV3RFU0Z6dw$JJhx2jLmVSPrKyMUpDm9sZZjJkPV5tIzjqicEbzrubo',
                'is_admin' => 1,
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => NULL,
                'name' => 'Mehriban',
                'email' => 'mehriban@test.az',
                'password' => '$2y$10$eipSJsO2VhS7g3ML.wdIJecQbjD4N1c9d1Jhnoc.Tmn7Lis8ijw3S',
                'is_admin' => 0,
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2022-04-12 19:03:56',
                'updated_at' => '2022-06-03 20:19:39',
            ),
            2 => 
            array (
                'id' => 3,
                'role_id' => 1,
                'name' => 'huseyn quliyev',
                'email' => 'huseyn.quliyev@metro.gov.az',
                'password' => '$2y$10$wulUZyvRNX7kWIIhpOhETOjPq8odklq5fzczhdSDoX0P9BHgbff6S',
                'is_admin' => 0,
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2022-08-24 09:49:11',
                'updated_at' => '2022-08-24 16:27:25',
            ),
            3 => 
            array (
                'id' => 14,
                'role_id' => 1,
                'name' => 'muhusabe@mailinator.com',
                'email' => 'jojigycig@mailinator.com',
                'password' => '$2y$10$XkebQR1sO.ZB0R2MoKS9H.Mz9Qpwj4IAktWnAWebeuK5KTAKu2BY6',
                'is_admin' => 0,
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2022-08-25 12:32:48',
                'updated_at' => '2022-08-25 12:58:44',
            ),
            4 => 
            array (
                'id' => 15,
                'role_id' => 1,
                'name' => 'Test',
                'email' => 'chingiz.a@safaroff.az',
                'password' => '$2y$10$/XUWgME8aEt8fTw.4S8fmuGE.4oDCYOBQoIJR3RH2JLQ6zX8xnWwW',
                'is_admin' => 0,
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2022-08-26 15:12:32',
                'updated_at' => '2022-08-26 15:12:32',
            ),
        ));
        
        
    }
}
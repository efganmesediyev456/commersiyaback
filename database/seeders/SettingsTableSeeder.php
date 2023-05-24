<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'app_name_az',
                'val' => '"Bakı Metropoliteni" Qapalı Səhmdar Cəmiyyəti',
                'created_at' => '2022-02-16 11:29:10',
                'updated_at' => '2022-02-22 11:39:08',
                'group' => 'default',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'app_name_en',
                'val' => '"Bakı Metropoliteni" Qapalı Səhmdar Cəmiyyəti',
                'created_at' => '2022-02-16 11:29:10',
                'updated_at' => '2022-02-22 11:39:08',
                'group' => 'default',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'app_name_ru',
                'val' => '"Bakı Metropoliteni" Qapalı Səhmdar Cəmiyyəti',
                'created_at' => '2022-02-16 11:29:10',
                'updated_at' => '2022-02-22 11:39:08',
                'group' => 'default',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'slogan_az',
                'val' => '"Bakı Metropoliteni" <br> Qapalı Səhmdar Cəmiyyəti',
                'created_at' => '2022-02-16 11:29:10',
                'updated_at' => '2022-02-22 11:36:55',
                'group' => 'default',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'slogan_en',
                'val' => '"Bakı Metropoliteni" <br> Qapalı Səhmdar Cəmiyyəti',
                'created_at' => '2022-02-16 11:29:10',
                'updated_at' => '2022-02-22 11:37:08',
                'group' => 'default',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'slogan_ru',
                'val' => '"Bakı Metropoliteni" <br> Qapalı Səhmdar Cəmiyyəti',
                'created_at' => '2022-02-16 11:29:10',
                'updated_at' => '2022-02-22 11:36:55',
                'group' => 'default',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'apply_slogan_az',
                'val' => NULL,
                'created_at' => '2022-02-16 11:29:10',
                'updated_at' => '2022-08-25 08:21:20',
                'group' => 'default',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'apply_slogan_en',
                'val' => NULL,
                'created_at' => '2022-02-16 11:29:10',
                'updated_at' => '2022-08-25 08:23:54',
                'group' => 'default',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'apply_slogan_ru',
                'val' => NULL,
                'created_at' => '2022-02-16 11:29:10',
                'updated_at' => '2022-08-25 08:23:54',
                'group' => 'default',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'facebook',
                'val' => 'https://www.facebook.com/bakimetropoliteni',
                'created_at' => '2022-02-16 11:29:10',
                'updated_at' => '2022-06-01 14:28:08',
                'group' => 'default',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'instagram',
                'val' => 'https://www.instagram.com/baki_metropoliteni/',
                'created_at' => '2022-02-16 11:29:10',
                'updated_at' => '2022-06-01 14:29:23',
                'group' => 'default',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'linkedin',
                'val' => NULL,
                'created_at' => '2022-02-16 11:29:10',
                'updated_at' => '2022-02-16 11:29:10',
                'group' => 'default',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'twitter',
                'val' => 'https://twitter.com/baku_metro',
                'created_at' => '2022-02-16 11:29:10',
                'updated_at' => '2022-06-01 14:29:23',
                'group' => 'default',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'telegram',
                'val' => 'https://t.me/bakumetro',
                'created_at' => '2022-02-16 11:29:10',
                'updated_at' => '2022-08-25 11:06:30',
                'group' => 'default',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'youtube',
                'val' => 'https://www.youtube.com/channel/UC2P8VfW0MFgEo6zMgUGurWA',
                'created_at' => '2022-02-16 11:29:10',
                'updated_at' => '2022-06-01 14:29:23',
                'group' => 'default',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'e-apply',
                'val' => NULL,
                'created_at' => '2022-02-16 11:29:10',
                'updated_at' => '2022-02-16 11:29:10',
                'group' => 'default',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'volunteers',
                'val' => NULL,
                'created_at' => '2022-02-16 11:29:10',
                'updated_at' => '2022-02-16 11:29:10',
                'group' => 'default',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'logo',
                'val' => 'app/v41fgugAKVQrEc7BxHPIv98NQyBJn5fqYE1kzvlW.svg',
                'created_at' => '2022-02-22 11:35:45',
                'updated_at' => '2022-02-22 11:35:45',
                'group' => 'default',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'footer_logo',
                'val' => 'app/HKDQYFdwuWG909xuzdzOAtO5gyKt6BC32wUJE1KV.svg',
                'created_at' => '2022-02-22 11:35:45',
                'updated_at' => '2022-02-22 11:35:45',
                'group' => 'default',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'cover',
                'val' => 'app/knWn8Bmi4ZNRfxptdTWqkETzvXjc3736JiFtZ0CU.mp4',
                'created_at' => '2022-02-22 14:35:09',
                'updated_at' => '2022-06-20 20:39:13',
                'group' => 'default',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'cooperation-e-apply',
                'val' => 'hr@metro.gov.az',
                'created_at' => '2022-03-16 20:36:20',
                'updated_at' => '2022-11-22 19:03:37',
                'group' => 'default',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'contact-e-apply',
                'val' => 'info@metro.gov.az',
                'created_at' => '2022-03-16 20:36:20',
                'updated_at' => '2022-11-22 19:03:37',
                'group' => 'default',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'tiktok',
                'val' => '#',
                'created_at' => '2022-03-16 21:10:04',
                'updated_at' => '2022-03-16 21:10:04',
                'group' => 'default',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'portal_logo1',
                'val' => 'app/luBUxR0MB2tJOkqxDUhx1XUxIEYj4zYMc0cWmZAb.svg',
                'created_at' => '2022-04-29 14:39:10',
                'updated_at' => '2022-04-29 14:39:10',
                'group' => 'default',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'portal_logo2',
                'val' => 'app/6zTO8eLMBVFtNexH72MsndQqg2YrO28YTvzFT3JM.svg',
                'created_at' => '2022-04-29 14:39:10',
                'updated_at' => '2022-04-29 14:39:10',
                'group' => 'default',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'portallogo1url',
                'val' => 'https://corporate.metro.gov.az/login',
                'created_at' => '2022-04-29 14:39:10',
                'updated_at' => '2022-05-16 16:19:40',
                'group' => 'default',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'portallogo2url',
                'val' => 'https://dxr.az/',
                'created_at' => '2022-04-29 14:39:10',
                'updated_at' => '2022-05-16 16:19:14',
                'group' => 'default',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'language',
                'val' => 'ru',
                'created_at' => '2022-09-20 11:19:42',
                'updated_at' => '2022-09-20 11:20:38',
                'group' => 'default',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'scheduler_days',
                'val' => '["Sunday","Monday"]',
                'created_at' => '2022-09-20 11:22:04',
                'updated_at' => '2022-09-20 11:22:04',
                'group' => 'default',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'sitelanguage',
                'val' => '["az","en","ru"]',
                'created_at' => '2022-09-20 11:24:24',
                'updated_at' => '2022-10-19 10:11:25',
                'group' => 'default',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'from_t',
                'val' => '{"from":["news","events","actual"]}',
                'created_at' => '2022-10-31 18:43:41',
                'updated_at' => '2022-11-17 16:47:55',
                'group' => 'default',
            ),
        ));
        
        
    }
}
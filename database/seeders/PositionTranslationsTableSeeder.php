<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PositionTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('position_translations')->delete();
        
        \DB::table('position_translations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'position_id' => 1,
                'title' => '“Bakı Metropoliteni”  QSC-nin aparatı',
                'locale' => 'az',
                'subtitle' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'position_id' => 1,
                'title' => NULL,
                'locale' => 'en',
                'subtitle' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'position_id' => 1,
                'title' => NULL,
                'locale' => 'ru',
                'subtitle' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'position_id' => 2,
                'title' => 'İnformasiya texnologiyaları xidməti',
                'locale' => 'az',
                'subtitle' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'position_id' => 2,
                'title' => NULL,
                'locale' => 'en',
                'subtitle' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'position_id' => 2,
                'title' => NULL,
                'locale' => 'ru',
                'subtitle' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'position_id' => 3,
                'title' => 'Elektromexanika xidməti',
                'locale' => 'az',
                'subtitle' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'position_id' => 3,
                'title' => NULL,
                'locale' => 'en',
                'subtitle' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'position_id' => 3,
                'title' => NULL,
                'locale' => 'ru',
                'subtitle' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'position_id' => 4,
                'title' => 'Hərəkət xidməti',
                'locale' => 'az',
                'subtitle' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'position_id' => 4,
                'title' => NULL,
                'locale' => 'en',
                'subtitle' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'position_id' => 4,
                'title' => NULL,
                'locale' => 'ru',
                'subtitle' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'position_id' => 5,
                'title' => 'Tikinti departamenti',
                'locale' => 'az',
                'subtitle' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'position_id' => 5,
                'title' => NULL,
                'locale' => 'en',
                'subtitle' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'position_id' => 5,
                'title' => NULL,
                'locale' => 'ru',
                'subtitle' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'position_id' => 6,
                'title' => 'Eskalator xidməti',
                'locale' => 'az',
                'subtitle' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'position_id' => 6,
                'title' => NULL,
                'locale' => 'en',
                'subtitle' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'position_id' => 6,
                'title' => NULL,
                'locale' => 'ru',
                'subtitle' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'position_id' => 7,
                'title' => 'Depolar üzrə iş departamenti',
                'locale' => 'az',
                'subtitle' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'position_id' => 7,
                'title' => NULL,
                'locale' => 'en',
                'subtitle' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'position_id' => 7,
                'title' => NULL,
                'locale' => 'ru',
                'subtitle' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'position_id' => 8,
                'title' => 'Perspektiv inkişaf və əsaslı tikinti nəzarəti departamenti',
                'locale' => 'az',
                'subtitle' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'position_id' => 8,
                'title' => NULL,
                'locale' => 'en',
                'subtitle' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'position_id' => 8,
                'title' => NULL,
                'locale' => 'ru',
                'subtitle' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'position_id' => 9,
                'title' => 'Nəqliyyat və xüsusi texnika departamenti',
                'locale' => 'az',
                'subtitle' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'position_id' => 9,
                'title' => NULL,
                'locale' => 'en',
                'subtitle' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'position_id' => 9,
                'title' => NULL,
                'locale' => 'ru',
                'subtitle' => NULL,
            ),
        ));
        
        
    }
}
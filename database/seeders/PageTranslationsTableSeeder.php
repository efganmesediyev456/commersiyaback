<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PageTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('page_translations')->delete();
        
        \DB::table('page_translations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'page_id' => 1,
                'title' => 'Ana səhifə',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            1 => 
            array (
                'id' => 487,
                'page_id' => 181,
                'title' => 'Sorğular',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            2 => 
            array (
                'id' => 488,
                'page_id' => 181,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            3 => 
            array (
                'id' => 489,
                'page_id' => 181,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            4 => 
            array (
                'id' => 747,
                'page_id' => 1,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            5 => 
            array (
                'id' => 748,
                'page_id' => 1,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            6 => 
            array (
                'id' => 1118,
                'page_id' => 379,
                'title' => 'Bizim liman',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            7 => 
            array (
                'id' => 1119,
                'page_id' => 379,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            8 => 
            array (
                'id' => 1120,
                'page_id' => 379,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            9 => 
            array (
                'id' => 1121,
                'page_id' => 380,
                'title' => 'Tarix',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            10 => 
            array (
                'id' => 1122,
                'page_id' => 380,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            11 => 
            array (
                'id' => 1123,
                'page_id' => 380,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            12 => 
            array (
                'id' => 1124,
                'page_id' => 381,
                'title' => 'Limanın inkişafı yol xəritəsi',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
            'description' => '&lt;p&gt;Bakı Limanı Ələtdə (Bakıdan 70 km cənubda yerləşən qəsəbə), iki əsas nəqliyyat dəhlizinin - Şərq-Qərb və Şimal-Cənub dəhlizlərinin kəsişməsində yerləşir. Bura, eyni zamanda Azərbaycanın əsas dəmiryolu və magistral şəbəkələrinin birləşdiyi mərkəz kimi limanın məqsədlərinin yerinə yetirilməsinə k&amp;ouml;mək edir və regional və qlobal təchizat zəncirlərində m&amp;uuml;h&amp;uuml;m rol oynayır.&lt;br /&gt;
Bakı Limanı əsas intermodal paylama mərkəzi kimi fəaliyyət g&amp;ouml;stərməklə yanaşı limanın fəaliyyəti, G&amp;ouml;mr&amp;uuml;k və M&amp;uuml;vəqqəti saxlanc anbarları, Ələt qəsəbəsi və m&amp;uuml;xtəlif nəqliyyat və qeyri-nəqliyyat sektoru ilə bağlı layihələri &amp;ouml;z&amp;uuml;ndə əks etdirən kompleks inkişaf modelindən istifadə edir.&lt;/p&gt;',
                'locale' => 'az',
            ),
            13 => 
            array (
                'id' => 1125,
                'page_id' => 381,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            14 => 
            array (
                'id' => 1126,
                'page_id' => 381,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            15 => 
            array (
                'id' => 1127,
                'page_id' => 382,
                'title' => 'Missiya, baxış və dəyərlər',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            16 => 
            array (
                'id' => 1128,
                'page_id' => 382,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            17 => 
            array (
                'id' => 1129,
                'page_id' => 382,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            18 => 
            array (
                'id' => 1130,
                'page_id' => 383,
                'title' => 'İdarə heyəti',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            19 => 
            array (
                'id' => 1131,
                'page_id' => 383,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            20 => 
            array (
                'id' => 1132,
                'page_id' => 383,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            21 => 
            array (
                'id' => 1133,
                'page_id' => 384,
                'title' => 'Mansur Mammadov',
                'second_title' => 'İcraçı direktor',
                'subtitle' => 'Tortor tellus sed habitant nullam tellus aliquam lectus sapien massa. Mauris pharetra egestas amet nec nullam senectus.',
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            22 => 
            array (
                'id' => 1134,
                'page_id' => 384,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            23 => 
            array (
                'id' => 1135,
                'page_id' => 384,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            24 => 
            array (
                'id' => 1136,
                'page_id' => 385,
                'title' => 'Jalal Gaytaranov',
                'second_title' => 'Jalal Gaytaranov',
                'subtitle' => 'Jalal Gaytaranov',
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            25 => 
            array (
                'id' => 1137,
                'page_id' => 385,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            26 => 
            array (
                'id' => 1138,
                'page_id' => 385,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            27 => 
            array (
                'id' => 1142,
                'page_id' => 387,
                'title' => 'Jalal Gaytaranov1',
                'second_title' => 'Jalal Gaytaranov',
                'subtitle' => 'Jalal Gaytaranov',
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            28 => 
            array (
                'id' => 1143,
                'page_id' => 387,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            29 => 
            array (
                'id' => 1144,
                'page_id' => 387,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            30 => 
            array (
                'id' => 1145,
                'page_id' => 388,
                'title' => 'Jalal Gaytaranov2',
                'second_title' => 'Jalal Gaytaranov',
                'subtitle' => 'Jalal Gaytaranov',
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            31 => 
            array (
                'id' => 1146,
                'page_id' => 388,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            32 => 
            array (
                'id' => 1147,
                'page_id' => 388,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            33 => 
            array (
                'id' => 1148,
                'page_id' => 389,
                'title' => 'Jalal Gaytaranov3',
                'second_title' => 'Jalal Gaytaranov',
                'subtitle' => 'Jalal Gaytaranov',
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            34 => 
            array (
                'id' => 1149,
                'page_id' => 389,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            35 => 
            array (
                'id' => 1150,
                'page_id' => 389,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            36 => 
            array (
                'id' => 1151,
                'page_id' => 390,
                'title' => 'Jalal Gaytaranov4',
                'second_title' => 'Jalal Gaytaranov',
                'subtitle' => 'Jalal Gaytaranov',
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            37 => 
            array (
                'id' => 1152,
                'page_id' => 390,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            38 => 
            array (
                'id' => 1153,
                'page_id' => 390,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            39 => 
            array (
                'id' => 1154,
                'page_id' => 391,
                'title' => 'Jalal Gaytaranov6',
                'second_title' => 'Jalal Gaytaranov',
                'subtitle' => 'Jalal Gaytaranov',
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            40 => 
            array (
                'id' => 1155,
                'page_id' => 391,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            41 => 
            array (
                'id' => 1156,
                'page_id' => 391,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            42 => 
            array (
                'id' => 1157,
                'page_id' => 392,
                'title' => 'İllik raport',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '&lt;p&gt;Sit proin vitae habitant dui purus. Velit amet eros purus risus. Iaculis diam erat mi nullam. Volutpat non erat potenti adipiscing arcu. Arcu dolor sed aenean tristique. Magna ac phasellus enim ipsum nunc. Facilisis sit libero id in vulputate. Imperdiet enim urna consectetur montes. Eget sagittis egestas mattis egestas et scelerisque nunc rhoncus eget. Dignissim ultricies natoque mauris magna mollis commodo. Tortor lacinia id consectetur cursus. Sed viverra risus interdum fames nec velit mauris ipsum pellentesque.&lt;br /&gt;
Dui id at posuere vel luctus vivamus. Ullamcorper odio faucibus sapien feugiat leo faucibus. Nulla urna nunc vitae elementum eget. Magna gravida eu sed laoreet amet cursus phasellus accumsan. Scelerisque morbi ipsum ultrices nulla sit. Habitant nisl fermentum quam varius quis consequat tellus. Netus et sagittis etiam luctus. Pretium posuere pharetra placerat cras lectus dictumst euismod.&lt;/p&gt;',
                'locale' => 'az',
            ),
            43 => 
            array (
                'id' => 1158,
                'page_id' => 392,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            44 => 
            array (
                'id' => 1159,
                'page_id' => 392,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            45 => 
            array (
                'id' => 1160,
                'page_id' => 393,
                'title' => 'Biznes',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            46 => 
            array (
                'id' => 1161,
                'page_id' => 393,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            47 => 
            array (
                'id' => 1162,
                'page_id' => 393,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            48 => 
            array (
                'id' => 1163,
                'page_id' => 394,
                'title' => 'Tariflər',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '&lt;p&gt;Bakı Limanı liman zonasına daxil olan gəmilərdən liman r&amp;uuml;sumlarının tutulmasına g&amp;ouml;rə məsuliyyət daşıyır və bu yığımlardan limanın inkişafı, idarə edilməsi və istismarı &amp;uuml;&amp;ccedil;&amp;uuml;n istifadə edir. Aşağıda g&amp;ouml;stərilən sənədlərdə Bakı Limanının nəzarəti altında olan ərazilər və obyektlər &amp;uuml;&amp;ccedil;&amp;uuml;n q&amp;uuml;vvədə olan tariflər və yığımlar təsvir edilir. &amp;quot;Tarif kitab&amp;ccedil;ası&amp;quot;nın Azərbaycan və ingilis dillərindəki versiyaları arasında hər hansı uyğunsuzluq olduqda Azərbaycan dilindəki versiya tətbiq edilir. Tarif kitab&amp;ccedil;ası m&amp;uuml;raciət əsasında təqdim olunur.&lt;/p&gt;',
                'locale' => 'az',
            ),
            49 => 
            array (
                'id' => 1164,
                'page_id' => 394,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            50 => 
            array (
                'id' => 1165,
                'page_id' => 394,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            51 => 
            array (
                'id' => 1166,
                'page_id' => 395,
                'title' => 'Multimodal daşımalar',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            52 => 
            array (
                'id' => 1167,
                'page_id' => 395,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            53 => 
            array (
                'id' => 1168,
                'page_id' => 395,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            54 => 
            array (
                'id' => 1169,
                'page_id' => 396,
                'title' => 'Ətraf mühit',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            55 => 
            array (
                'id' => 1170,
                'page_id' => 396,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            56 => 
            array (
                'id' => 1171,
                'page_id' => 396,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            57 => 
            array (
                'id' => 1172,
                'page_id' => 397,
                'title' => 'Sertifikatlar',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '&lt;p&gt;Bakı Limanı olaraq hesab edirik ki, y&amp;uuml;ksək standartların tətbiqi əməliyyatların dayanıqlılığına, liman xidmətlərinin təkmilləşdirilməsinə və maliyyə &amp;ouml;hdəliyinin səmərəli şəkildə icrasına gətirib &amp;ccedil;ıxarır. İSO Sertifikatları limana təqdim olunan xidmətlərin hər zaman m&amp;uuml;ştərilərin tələblərinə uyğun olmasını, əməliyyatların keyfiyyətinin davamlı şəkildə təkmilləşdirilməsini və risklərin m&amp;uuml;əyyənləşdirilməsi və aradan qaldırılmasını təmin etməyə k&amp;ouml;mək edir. 2019-cu ildə Bakı Limanı ISO9001 Keyfiyyətin İdarə edilməsi Sistemi Standartı və ISO14001 Ətraf m&amp;uuml;hitin İdarə edilməsi Sertifikatını almağa m&amp;uuml;vəffəq olmuşdur.&lt;br /&gt;
Biz, həm&amp;ccedil;inin, 2019-cu ildə Xəzər dənizi limanları arasında ilk dəfə Avropa Dəniz Limanları Təşkilatının (ESPO) əsas ekoloji təşəbb&amp;uuml;s&amp;uuml; olan EcoPorts-un verdiyi Liman Ekoloji Ekspertiza Sistemi (PERS) sertifikatını aldıq. Bununla da Bakı Limanı Avropada qeyd olunan sertifikatı almış 34 limandan biri oldu.&lt;br /&gt;
22 sentyabr 2017-ci il tarixində Bakı Limanı OHSAS 18001:2007 sertifikatına layiq g&amp;ouml;r&amp;uuml;lm&amp;uuml;şd&amp;uuml;r. Bu bir daha təsdiqləyir ki, Bakı Limanı təhl&amp;uuml;kəsiz və sağlam iş m&amp;uuml;hitini dəstəkləyir və peşə sağlamlığı və təhl&amp;uuml;kəsizliyi ilə bağlı mənfi məqamlara nəzarət edərək qəzaların baş vermə riskini minimuma endirməyə &amp;ccedil;alışır. Bu, həm&amp;ccedil;inin Bakı Limanının iqtisadi inkişafla yanaşı peşə sağlamlığı və təhl&amp;uuml;kəsizliyinin də təmin edilməsinə can atan məsuliyyətli qurum olduğunu g&amp;ouml;stərir.&lt;/p&gt;',
                'locale' => 'az',
            ),
            58 => 
            array (
                'id' => 1173,
                'page_id' => 397,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            59 => 
            array (
                'id' => 1174,
                'page_id' => 397,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            60 => 
            array (
                'id' => 1175,
                'page_id' => 398,
                'title' => 'İnsan kapitalı',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            61 => 
            array (
                'id' => 1176,
                'page_id' => 398,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            62 => 
            array (
                'id' => 1177,
                'page_id' => 398,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            63 => 
            array (
                'id' => 1178,
                'page_id' => 399,
                'title' => 'İnsan resursları siyasətimiz',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '&lt;p&gt;&amp;ldquo;Bakı Beynəlxalq Dəniz Ticarət Limanı&amp;rdquo; Qapalı Səhmdar Cəmiyyətinin İnsan resursları Siyasəti - İnsan resursları potensialına olan tələbatın m&amp;uuml;əyyənləşdirilməsi, ehtiyat kadr bazasının formalaşdırılması, insan resurslarının m&amp;uuml;asir &amp;uuml;sullardan istifadə edərək se&amp;ccedil;ilməsi və yerləşdirilməsi, əmək məhsuldarlığının artırılması məqsədi ilə əmək fəaliyyətinin qiymətləndirilməsi və motivasiya tədbirlərinin g&amp;ouml;r&amp;uuml;lməsi, insan resurslarının peşəkar inkişafının təmin edilməsi məqsədi ilə zəruri şəraitin yaradılması və insan resurslarının daha səmərəli idarə edilməsi, risk mədəniyyətinin və korporativ etik dəyərlərin formalaşdırılması məqsədi ilə həyata ke&amp;ccedil;irilməsi nəzərdə tutulan digər əlaqədar kompleks tədbirləri əhatə edir. Y&amp;uuml;ksək potensiallı kadrların cəlbi ilə yanaşı, onların davamlı inkişafı Bakı Limanının insan resursları siyasətinin prioritet istiqamətlərindəndir.&lt;/p&gt;',
                'locale' => 'az',
            ),
            64 => 
            array (
                'id' => 1179,
                'page_id' => 399,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            65 => 
            array (
                'id' => 1180,
                'page_id' => 399,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            66 => 
            array (
                'id' => 1181,
                'page_id' => 400,
                'title' => 'Təcrübə proqramı',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            67 => 
            array (
                'id' => 1182,
                'page_id' => 400,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            68 => 
            array (
                'id' => 1183,
                'page_id' => 400,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            69 => 
            array (
                'id' => 1184,
                'page_id' => 401,
                'title' => 'Media və Xəbərlər',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            70 => 
            array (
                'id' => 1185,
                'page_id' => 401,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            71 => 
            array (
                'id' => 1186,
                'page_id' => 401,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            72 => 
            array (
                'id' => 1187,
                'page_id' => 402,
                'title' => 'Xəbərlər',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            73 => 
            array (
                'id' => 1188,
                'page_id' => 402,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            74 => 
            array (
                'id' => 1189,
                'page_id' => 402,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            75 => 
            array (
                'id' => 1190,
                'page_id' => 403,
                'title' => 'Brifinqlər',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            76 => 
            array (
                'id' => 1191,
                'page_id' => 403,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            77 => 
            array (
                'id' => 1192,
                'page_id' => 403,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            78 => 
            array (
                'id' => 1193,
                'page_id' => 404,
                'title' => 'Xəbər arxivləri',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            79 => 
            array (
                'id' => 1194,
                'page_id' => 404,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            80 => 
            array (
                'id' => 1195,
                'page_id' => 404,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            81 => 
            array (
                'id' => 1196,
                'page_id' => 405,
                'title' => 'Qalereya',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            82 => 
            array (
                'id' => 1197,
                'page_id' => 405,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            83 => 
            array (
                'id' => 1198,
                'page_id' => 405,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            84 => 
            array (
                'id' => 1199,
                'page_id' => 406,
                'title' => 'Videolar',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            85 => 
            array (
                'id' => 1200,
                'page_id' => 406,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            86 => 
            array (
                'id' => 1201,
                'page_id' => 406,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            87 => 
            array (
                'id' => 1202,
                'page_id' => 407,
                'title' => 'Əlaqə məlumatları',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            88 => 
            array (
                'id' => 1203,
                'page_id' => 407,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            89 => 
            array (
                'id' => 1204,
                'page_id' => 407,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            90 => 
            array (
                'id' => 1205,
                'page_id' => 408,
                'title' => 'Elanlar',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            91 => 
            array (
                'id' => 1206,
                'page_id' => 408,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            92 => 
            array (
                'id' => 1207,
                'page_id' => 408,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            93 => 
            array (
                'id' => 1208,
                'page_id' => 409,
                'title' => 'Sosial məsuliyyət',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            94 => 
            array (
                'id' => 1209,
                'page_id' => 409,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            95 => 
            array (
                'id' => 1210,
                'page_id' => 409,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
            96 => 
            array (
                'id' => 1211,
                'page_id' => 410,
                'title' => 'Beynəlxalq əməkdaşlıq',
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'az',
            ),
            97 => 
            array (
                'id' => 1212,
                'page_id' => 410,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'en',
            ),
            98 => 
            array (
                'id' => 1213,
                'page_id' => 410,
                'title' => NULL,
                'second_title' => NULL,
                'subtitle' => NULL,
                'link' => NULL,
                'description' => '',
                'locale' => 'ru',
            ),
        ));
        
        
    }
}
<?php

return [

    // All the sections for the settings page
    'sections' => [
        'app' => [
            'title' => 'Məlumatlar ',
            'icon' => 'fa fa-cog', // (optional)

            'inputs' => [
                [
                    'name' => 'app_name_az', // unique key for setting
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'Saytın adı (AZ)', // label for input
                    // optional properties
                    'placeholder' => 'AREA', // placeholder for input

                ],
                [
                    'name' => 'app_name_en', // unique key for setting
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'Saytın adı (EN)', // label for input
                    // optional properties
                    'placeholder' => 'AREA', // placeholder for input

                ],
                [
                    'name' => 'app_name_ru', // unique key for setting
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'Saytın adı (RU)', // label for input
                    // optional properties
                    'placeholder' => 'AREA', // placeholder for input

                ],

                [
                    'name' => 'logo',
                    'type' => 'image',
                    'label' => 'Logo ',
                    'rules' => 'image|max:25000|mimes:mp4,ogx,oga,ogv,ogg,webm,jpg,svg,png,jpeg,webp,gif',
                    'disk' => 'public', // which disk you want to upload
                    'path' => 'app', // path on the disk,
                    'preview_class' => 'thumbnail',
                    'preview_style' => 'height:40px'
                ],
                [
                    'name' => 'footer_logo',
                    'type' => 'image',
                    'label' => 'Footer logo',
                    'rules' => 'image|max:25000|mimes:mp4,ogx,oga,ogv,ogg,webm,jpg,svg,png,jpeg,webp,gif',
                    'disk' => 'public', // which disk you want to upload
                    'path' => 'app', // path on the disk,
                    'preview_class' => 'thumbnail',
                    'preview_style' => 'height:40px'
                ],
                [
                    'name' => 'cover',
                    'type' => 'image',
                    'label' => 'Cover ',
                    'rules' => 'file|max:25000|mimes:mp4,ogx,oga,ogv,ogg,webm,jpg,svg,png,jpeg,webp,gif',
                    'disk' => 'public', // which disk you want to upload
                    'path' => 'app', // path on the disk,
                    'preview_class' => 'thumbnail',
                    'preview_style' => 'height:40px'
                ],
                [
                    'name' => 'portal_logo1',
                    'type' => 'image',
                    'label' => 'Portal logo1',
                    'rules' => 'image|max:25000|mimes:mp4,ogx,oga,ogv,ogg,webm,jpg,svg,png,jpeg,webp,gif',
                    'disk' => 'public', // which disk you want to upload
                    'path' => 'app', // path on the disk,
                    'preview_class' => 'thumbnail',
                    'preview_style' => 'height:40px'
                ],
                [
                    'name' => 'portal_logo2',
                    'type' => 'image',
                    'label' => 'Portal logo2',
                    'rules' => 'image|max:25000|mimes:mp4,ogx,oga,ogv,ogg,webm,jpg,svg,png,jpeg,webp,gif',
                    'disk' => 'public', // which disk you want to upload
                    'path' => 'app', // path on the disk,
                    'preview_class' => 'thumbnail',
                    'preview_style' => 'height:40px'
                ],

                [
                    'name' => 'portallogo1url', // unique key for setting
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'Portal Logo1 Url', // label for input
                    // optional properties
                    'placeholder' => '', // placeholder for input
                ],
                [
                    'name' => 'portallogo2url', // unique key for setting
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'Portal Logo2 Url', // label for input
                    // optional properties
                    'placeholder' => '', // placeholder for input
                ],

                [
                    'name' => 'slogan_az', // unique key for setting
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'Slogan (AZ)', // label for input
                    'placeholder' => 'AREA', // placeholder for input

                ],
                [
                    'name' => 'slogan_en', // unique key for setting
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'Slogan (EN)', // label for input
                    'placeholder' => 'AREA', // placeholder for input

                ],
                [
                    'name' => 'slogan_ru', // unique key for setting
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'Slogan (RU)', // label for input
                    'placeholder' => 'AREA', // placeholder for input

                ],

                [
                    'name' => 'apply_slogan_az', // unique key for setting
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => '"Qəbula yazıl" slogan (AZ)', // label for input
                    'placeholder' => 'AREA', // placeholder for input

                ],
                [
                    'name' => 'apply_slogan_en', // unique key for setting
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => '"Qəbula yazıl" slogan (EN)', // label for input
                    'placeholder' => 'AREA', // placeholder for input

                ],
                [
                    'name' => 'apply_slogan_ru', // unique key for setting
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => '"Qəbula yazıl" slogan (RU)', // label for input
                    'placeholder' => 'AREA', // placeholder for input

                ],




            ]
        ],
        'email' => [
            'title' => 'Sosial Media hesabları',
            'icon' => 'fas fa-hashtag',

            'inputs' => [
                [
                    'name' => 'facebook',
                    'type' => 'text',
                    'label' => 'Facebook',

                ],
                [
                    'name' => 'instagram',
                    'type' => 'text',
                    'label' => 'Instagram',

                ],

                [
                    'name' => 'twitter',
                    'type' => 'text',
                    'label' => 'Twitter',

                ],

                [
                    'name' => 'tiktok',
                    'type' => 'text',
                    'label' => 'Tiktok',

                ],
                [
                    'name' => 'telegram',
                    'type' => 'text',
                    'label' => 'Telegram',

                ],
                [
                    'name' => 'youtube',
                    'type' => 'text',
                    'label' => 'Youtube',

                ],


            ]
        ],
        'mail' => [
            'title' => 'E-maillərin ünvanları',
            'icon' => 'fas fa-mail-bulk',

            'inputs' => [
                [
                    'name' => 'cooperation-e-apply',
                    'type' => 'text',
                    'label' => 'Əməkdaşlıq – Elektron müraciət',

                ],
                [
                    'name' => 'contact-e-apply',
                    'type' => 'text',
                    'label' => 'Əlaqə – Elektron müraciət',

                ],


            ]
        ]

    ],

    // Setting page url, will be used for get and post request
    'url' => 'admin/settings-app',


    // Any middleware you want to run on above route
    'middleware' => ['auth:admin'],

    'route_settings' => [
        'middleware' => ['web','auth:admin','role'],
        'as'         => 'settings-app'
    ],

    // View settings
    'setting_page_view' => 'app_settings::settings_page',
    'flash_partial' => 'app_settings::_flash',

    // Setting section class setting
    'section_class' => 'card mb-3',
    'section_heading_class' => 'card-header',
    'section_body_class' => 'card-body',

    // Input wrapper and group class setting
    'input_wrapper_class' => 'form-group',
    'input_class' => 'form-control',
    'input_error_class' => 'has-error',
    'input_invalid_class' => 'is-invalid',
    'input_hint_class' => 'form-text text-muted',
    'input_error_feedback_class' => 'text-danger',

    // Submit button
    'submit_btn_text' => 'Yadda Saxla',
    'submit_success_message' => 'Yadda saxlanıldı.',

    // Remove any setting which declaration removed later from sections
    'remove_abandoned_settings' => false,

    // Controller to show and handle save setting
    'controller' => '\QCod\AppSettings\Controllers\AppSettingController',

    // settings group
    'setting_group' =>  'default'

];

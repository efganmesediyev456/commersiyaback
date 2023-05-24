#Steps

**1.Run command** \
`composer install`

**2.Change `.env` settings** 


**3. in `vendor/qcod/laravel-app-settings/src/routes/web.php`**
```php
Route::group([
    'middleware' => array_merge(['web'], config('app_settings.middleware', []))
], function () {
    Route::get(config('app_settings.url'), config('app_settings.controller').'@index');
    Route::post(config('app_settings.url'), config('app_settings.controller').'@store');
});
```
### Change to
```php
Route::group(config('app_settings.route_settings'), function () {
    Route::get(config('app_settings.url'), config('app_settings.controller').'@index')->name('.index');
    Route::post(config('app_settings.url'), config('app_settings.controller').'@store')->name('.store');
});
```

**4. Run command** \
`php artisan first:start`

**5. Run command** \
`php artisan serve`

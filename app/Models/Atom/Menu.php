<?php

namespace App\Models\Atom;

use App\Helpers\Scopes;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Menu extends Model
{
    use HasFactory, Translatable, LogsActivity, Scopes;

    protected static $logAttributes = ['*'];

    protected $guarded = [];

    public $translationModel = 'App\Models\TranslatorModels\MenuTranslation';

    public $translatedAttributes = ['title'];

    public $with = ['translations'];



    public function children() {
        return $this->hasMany(MenuItem::class,'menu_id') ;
    }


    public static function getItems($slug,$onlyActive = false) {
        $menu = self::where('slug',$slug)->active()->first();

        if (is_null($menu)) return [];


        $menuItems = $menu->children()->where(function ($query) use ($onlyActive)
        {
            if ($onlyActive)  $query->active() ;
        })->ordering()->main()->get() ;

        $items = [] ;
        foreach ($menuItems as $mi)
        {
            $items[] = $mi->getRecord();

        }



        return $items ;
    }

}

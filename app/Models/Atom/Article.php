<?php

namespace App\Models\Atom;

use App\Helpers\Scopes;
use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;

class Article extends Model
{
    use HasFactory , Translatable, LogsActivity, Scopes;

    protected static $logAttributes = ['*'];

    protected $guarded = [];



    public $translationModel = 'App\Models\TranslatorModels\ArticleTranslation';

    public $translatedAttributes = ['title', 'subtitle', 'description','category'];

    public $with = ['translations'];


    public static function observe($classes)
    {
    }

    public function simple_items()
    {
        return $this->hasMany('App\Models\Atom\SimpleItem', 'uniq_id','uniq_id');
    }


    public function get_simple_items($type)
    {
        return $this->simple_items()->where('type', $type)->active()->ordering()->get();
    }


    public function getDateAttribute($value)
    {

        $carbon  = Carbon::create($value);

        return  $carbon->translatedFormat( 'd') . ' ' .  mb_strtoupper($carbon->translatedFormat( 'F')) .
            ' / ' . $carbon->translatedFormat( 'Y')  .' / '. $carbon->translatedFormat( 'H') . ':' . $carbon->translatedFormat( 'i') ;
    }

    public function getDateWithHourAttribute()
    {

        $carbon  = Carbon::create($this->getRawOriginal('date'));



        return mb_ucfirst($carbon->translatedFormat( 'F')) .' ' . $carbon->translatedFormat( 'd') .
            ', ' . $carbon->translatedFormat( 'Y') . ', ' . $carbon->translatedFormat( 'H') .
            ':' . $carbon->translatedFormat( 'i')   ;


    }



    public function getSlugAttribute(){

        return Str::slug($this->translate(config('app.fallback_locale'))->title) ;
    }



    public function getOriginalDateAttribute() {
        return $this->getRawOriginal('date') ;
    }

}

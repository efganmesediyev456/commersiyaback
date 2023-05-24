<?php

namespace App\Models\Atom;

use App\Helpers\Scopes;
use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Collection;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class SimpleItem extends Model implements HasMedia
{
    use HasFactory, Translatable, LogsActivity, InteractsWithMedia, Scopes;

    protected static $logAttributes = ['*'];

    protected $guarded = [];

    public $translationModel = 'App\Models\TranslatorModels\SimpleItemTranslation';

    public $translatedAttributes = ['title', 'subtitle', 'text_field', 'link','medium_text1','medium_text2',
                                    'medium_text3','medium_text4'];

    public $with = ['translations','media'];



    public function getDateAttribute($value)
    {

        $carbon  = Carbon::create($value);

        return  $carbon->translatedFormat( 'd') . ' ' .  mb_strtoupper($carbon->translatedFormat( 'F')) .
            ' / ' . $carbon->translatedFormat( 'Y');
    }

    public function getDateWithHourAttribute($value)
    {

        $carbon  = Carbon::create($value);

        return  $carbon->translatedFormat( 'd') . ' ' .  mb_strtoupper($carbon->translatedFormat( 'F')) .
            '/' . $carbon->translatedFormat( 'Y')  .'/'. $carbon->translatedFormat( 'H') . ':' . $carbon->translatedFormat( 'i') ;
    }

    public function getOriginalDateAttribute() {
        return $this->getRawOriginal('date') ;
    }


    public function getImageAttribute() {
        return $this->getMedia($this->type);
    }


}

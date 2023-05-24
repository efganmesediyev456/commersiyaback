<?php

namespace App\Models\Atom;

use App\Helpers\Scopes;
use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Vacancies extends Model
{
    use HasFactory, Translatable, LogsActivity, Scopes;


    public $translationModel = 'App\Models\TranslatorModels\VacancyTranslation';

    public $translatedAttributes = ['title',  'grafik','description','sales','ohdelik'];

    public $with = ['translations'];



    public function getActiveAttribute($value)
    {

        $carbon  = Carbon::create($value);

        return  $carbon->translatedFormat( 'd') . '.' .  $carbon->translatedFormat( 'm') .
            '.' . $carbon->translatedFormat( 'Y')   ;
    }

}

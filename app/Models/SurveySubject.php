<?php

namespace App\Models;

use App\Helpers\Scopes;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SurveySubject extends Model
{
    use HasFactory, Translatable, LogsActivity, Scopes;

    protected static $logAttributes = ['*'];

    protected $guarded = [];



    public $translationModel = 'App\Models\TranslatorModels\SurveySubjectTranslation';

    public $translatedAttributes = ['title',];

    public $with = ['translations'];


    public function surveyquestion(){
        return $this->hasMany(SurveyQuestion::class);
    }
}

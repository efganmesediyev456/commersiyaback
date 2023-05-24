<?php

namespace App\Models\TranslatorModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyQuestionTranslation extends Model
{
    use HasFactory;


    public $timestamps  = false;
    protected $guarded = [] ;

    protected $casts = [
        'answers' => 'object'
    ];



    public function setAnswersAttribute($value)
    {

        $this->attributes['answers'] = json_encode($value , JSON_FORCE_OBJECT) ;

    }




}

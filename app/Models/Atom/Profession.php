<?php

namespace App\Models\Atom;

use App\Helpers\Scopes;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Activitylog\Traits\LogsActivity;

class Profession extends Model
{
    use HasFactory, Translatable, LogsActivity, Scopes;

    protected $guarded = [];


    public $translationModel = 'App\Models\TranslatorModels\ProfessionTranslation';

    public $translatedAttributes = ['title',  'subtitle', 'description'];

    public $with = ['translations'];



    public function parent() : HasOne {
          return $this->hasOne(Position::class,'id','position_id') ;
    }

}

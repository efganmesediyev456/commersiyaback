<?php

namespace App\Models;

use App\Helpers\Scopes;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class BakuItem extends Model
{
    use HasFactory, Translatable, LogsActivity, Scopes;

    protected static $logAttributes = ['*'];

    protected $guarded = [];



    public $translationModel = 'App\Models\TranslatorModels\BakuItemTranslation';

    public $translatedAttributes = ['about','title','content_key','content_value'];

    public $with = ['translations'];
}

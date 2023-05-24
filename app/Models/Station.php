<?php

namespace App\Models;

use App\Helpers\Scopes;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use PhpParser\Node\Attribute;
use Spatie\Activitylog\Traits\LogsActivity;

class Station extends Model
{
    use HasFactory , Translatable, LogsActivity, Scopes;

    protected static $logAttributes = ['*'];

    protected $guarded = [];



    public $translationModel = 'App\Models\TranslatorModels\StationTranslation';

    public $translatedAttributes = ['title',];

    public $with = ['translations'];





}

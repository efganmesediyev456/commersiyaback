<?php

namespace App\Models\Atom;

use App\Helpers\Scopes;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\Traits\LogsActivity;

class Position extends Model
{
    use HasFactory, Translatable, LogsActivity, Scopes;

    protected $guarded = [];


    public $translationModel = 'App\Models\TranslatorModels\PositionTranslation';

    public $translatedAttributes = ['title',  'subtitle'];

    public $with = ['translations'];


    public function child() : HasMany
    {
        return  $this->hasMany(Profession::class);
    }
}

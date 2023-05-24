<?php

namespace App\Models\TranslatorModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BakuItemTranslation extends Model
{
    use HasFactory;


    public $timestamps  = false;
    protected $guarded = [] ;




    protected $casts = [
        'content_key' => 'object',
        'content_value' => 'object',
    ];

    public function setContentKeyAttribute($value)
    {

        $this->attributes['content_key'] = json_encode($value , JSON_FORCE_OBJECT) ;


    }
    public function setContentValueAttribute($value)
    {

        $this->attributes['content_value'] = json_encode($value , JSON_FORCE_OBJECT) ;


    }

}

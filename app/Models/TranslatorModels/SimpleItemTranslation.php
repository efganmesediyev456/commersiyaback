<?php

namespace App\Models\TranslatorModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimpleItemTranslation extends Model
{
    use HasFactory;



    public $timestamps  = false;
    protected $guarded = [] ;



    public function setTextFieldAttribute($value)
    {
        $this->attributes['text_field'] = htmlentities($this->removeScriptTag($value),ENT_QUOTES) ;

    }


    public function getTextFieldAttribute($value)
    {
        return $this->removeScriptTag(html_entity_decode($value)) ;
    }


    public function removeScriptTag($value)
    {
        $text = preg_replace('/<script>.*<\/script>/', '', $value) ;
        $text = preg_replace('/(<.+?)(?<=\s)on[a-z]+\s*=\s*(?:([\'"])(?!\2).+?\2|(?:\S+?\(.*?\)(?=[\s>])))(.*?>)/i', '', $text);

        return  $text;
    }

}

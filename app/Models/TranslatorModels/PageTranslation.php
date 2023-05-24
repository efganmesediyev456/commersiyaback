<?php

namespace App\Models\TranslatorModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{
    use HasFactory;


    public $timestamps  = false;
    protected $guarded = [] ;



    public function setDescriptionAttribute($value)
    {

        $this->attributes['description'] = htmlentities($this->removeScriptTag($value),ENT_QUOTES) ;

    }

    public function getDescriptionAttribute($value)
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

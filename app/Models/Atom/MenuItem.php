<?php

namespace App\Models\Atom;

use App\Helpers\Helper;
use App\Helpers\Scopes;
use Astrotomic\Translatable\Translatable;
use Barryvdh\Debugbar\Facade as DebugBar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class MenuItem extends Model
{
    use HasFactory, Translatable, LogsActivity, Scopes;

    protected static $logAttributes = ['*'];

    protected $guarded = [];

    public $translationModel = 'App\Models\TranslatorModels\MenuItemTranslation';

    public $translatedAttributes = ['title','link'];

    public $with = ['translations'];



    public function child()
    {
        return $this->hasMany(self::class, 'parent_id');
    }




    public function getRecord() {

        $model = $this->model ;
        $model_record_id = $this->model_record_id ;

        if (!is_null($this->link))
        {
            if (!preg_match('/https?:\/\//i', $this->link))
            {
                $this->link = trim( env('APP_URL') . '/' . config('app.locale') .  '/' . $this->link ,'/') ;

            }
        }


        if ($model_record_id && $model) {
            $item = $model::find($model_record_id) ;
            $item->link =  $this->link ?? Helper::linkGenerator($item) ;
            $item->ordering =  $this->ordering ;
            $item->id =  $this->id ;
            $item->status =  $this->status ;
            $item->on_blank =  $this->on_blank ;
            foreach (config('app.locales') as $locale => $name)
            {
                if(isset($item->translate($locale)->title))
                {
                    $item->translate($locale)->title = $this->translate($locale)->title ?? $item->translate($locale)->title  ?? '';
                }
            }


            $item->children = $this->getch() ;


            return $item ;
        }
        else {

            $item = $this ;
            $item->children = $this->getch() ;


            return  $item ;
        }



    }


    public function getch() {
        $childs = $this->child()->orderBy('ordering','ASC')->get()  ;

        $ch = [] ;

        foreach ($childs as $bb)
        {
            $ch[] = $bb->getRecord() ;
        }

        return $ch ;



    }
}
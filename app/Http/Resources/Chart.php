<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Chart extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $stat  = $this->statisticToJson($this->medium_text1) ;

        return $stat ;
    }

    public function statisticToJson ($stat) {
            $arr = explode(',',$stat) ;
            $s = [] ;
            foreach ($arr as $a)
            {
                $t = explode('-',$a);
                $s['label'][] = trim($t[0]) ;
                $s['values'][] = trim($t[1]) ;

            }

            return $s;


    }
}

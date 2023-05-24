<?php

//READ JSON FILE
if (!function_exists('config_json')) {
    function config_json($key)
    {
        $path = explode('.', $key);
        $file = base_path('config/' . $path[0] . '.json');

        if (file_exists($file)) {
            $json = json_decode(file_get_contents($file), true);

            $arr = $json;
            for ($i = 1; $i < count($path); $i++) {
                if (key_exists($path[$i], $arr)) $arr =  $arr[$path[$i]];
                else return null;
            }

            return json_decode(json_encode($arr), FALSE);
        }

        return null;
    }
}


// for JSON CONFIG FILES ADD & UPDATE
if (!function_exists('config_json_add')) {
    function config_json_add($path,$array,$data)
    {
        $file = base_path('config/' . $path . '.json');

        if (file_exists($file)) {
            $json = json_decode(file_get_contents($file), true);
            $json[$array] = $data ;




            file_put_contents($file,json_encode($json,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_FORCE_OBJECT )) ;


        }

        return null;
    }
}

// delete item from JSON config file
if (!function_exists('config_json_delete')) {
    function config_json_delete($path,$array)
    {
        $file = base_path('config/' . $path . '.json');

        if (file_exists($file)) {
            $json = json_decode(file_get_contents($file), true);
            unset($json[$array]) ;

            file_put_contents($file,json_encode($json,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_FORCE_OBJECT )) ;


        }

        return null;
    }
}




if (!function_exists('in_object')) {
    function in_object($string,$object)
    {
        $obj = config_json($object) ;

        if (is_object($obj))
        {
            return  property_exists($obj,$string) ;
        }

        return false ;
    }
}



if (!function_exists('slug')) {
    function slug($string)
    {
        return Str::slug($string) ;
    }
}


if (!function_exists('route_name')) {
    function route_name(): ?string
    {

        return request()->route()->getName() ;
    }
}


if (!function_exists('mb_ucfirst')) {
    function mb_ucfirst($string): ?string
    {
        $first = mb_strtoupper(mb_substr($string,0,1)) ;
        $then = mb_strtolower(mb_substr($string,1,null)) ;

        return  $first . $then ;
    }
}



if (!function_exists('link_generator')) {
    function link_generator($object): ?string
    {

        return  '/' . config('app.locale') . '/' . \App\Helpers\Helper::linkGenerator($object) ;
    }
}


if (!function_exists('get_station')) {
    function get_station($collection,$formal_id,$option = false): ?string
    {


        $station = $collection->where('formal_id',$formal_id)->last() ;

        if(!$option)
        {
            $html = '<span class="' .$station->formal_id . '"
         data-color="' . $station->color . '"
         data-length="' .$station->distance . '"
          data-time="' . $station->time . '"
           data-after="' . $station->after . '"
            data-before="' . $station->before. '"
             >' . $station->title . '</span>' ;
        }
        else{
            $html = '<option value="' .$station->formal_id . '">' . $station->title . '</option>'   ;
        }


        return  $html ;
    }
}

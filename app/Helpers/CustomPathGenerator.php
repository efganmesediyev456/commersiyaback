<?php


//for Laravel Media Library

namespace App\Helpers;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

class CustomPathGenerator implements PathGenerator
{

    public function getPath(Media $media): string
    {
        return $this->pathGenerate($media) ;
    }

    public function getPathForConversions(Media $media): string
    {
        return $this->pathGenerate($media) ;
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->pathGenerate($media) ;
    }


    public function pathGenerate(Media $media):string
    {

        if(str_contains($media->mime_type , 'image'))
            return "media/{$media->collection_name}/{$media->id}/" ;

        return "files/{$media->collection_name}/{$media->id}/" ;
    }
}

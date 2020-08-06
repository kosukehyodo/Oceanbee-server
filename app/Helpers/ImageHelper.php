<?php

namespace App\Helpers;

class ImageHelper
{
    public static function store($file, $dir)
    {
        if (app()->isLocal()) {
            // development env
            $path = $file->store($dir, 'public');
        } else {
            // production env
            $path = $file->store($dir, 's3');
        }

        return $path;
    }

    public static function createLink($value)
    {
        if (app()->isLocal()) {
            // development env
            $url = asset("images/$value->image");
        } else {
            // production env
            // $path = $file->store($dir, 's3');
        }

        return $url;
    }
}

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

    public static function createLink($planImage)
    {
        if (app()->isLocal()) {
            // development env
            $url = asset("images/$planImage->path");
        } else {
            // production env
            // $path = $file->store($dir, 's3');
        }

        return $url;
    }
}

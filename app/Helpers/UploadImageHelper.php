<?php

namespace App\Helpers;

class UploadImageHelper
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
}

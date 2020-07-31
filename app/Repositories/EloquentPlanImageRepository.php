<?php

namespace App\Repositories;

use App\Models\PlanImage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Repositories\Contract\PlanImageContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class EloquentPlanImageRepository implements PlanImageContract
{
    public function __construct(PlanImage $planImage)
    {
        $this->plan = $planImage;
    }

    public function persist(Request $request)
    {

        $photos = $request->input('photo_body');
        $files = $request->file('photo');

        $photoFiles = array_combine($photos, $files) ;

        foreach ($photoFiles as $body => $file) {
            $planImage = new PlanImage();

            $path = Storage::disk('s3')->putFile('plan', $file);
            // dd(Storage::disk('s3')->url($path));
            $planImage->path = $path;
            $planImage->body = $body;
            
            $planImage->save();
        }
    }
}

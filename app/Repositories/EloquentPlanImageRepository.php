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
        $files = $request->file('photo');
        foreach ($files as $file) {
            $path = Storage::disk('s3')->putFile('plan', $file);
            dd($path);
        }
    }
}

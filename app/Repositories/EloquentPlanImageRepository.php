<?php

namespace App\Repositories;

use App\Helpers\ImageHelper;
use App\Models\PlanImage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Repositories\Contract\PlanImageContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\Cast\Object_;

class EloquentPlanImageRepository implements PlanImageContract
{
    public function __construct(PlanImage $planImage)
    {
        $this->plan = $planImage;
    }

    public function register(Request $request, Object $plan)
    {
        $photos = $request->input('photo_body');
        $files = $request->file('photo');

        $photoFiles = array_combine($photos, $files) ;

        DB::beginTransaction();
        try {
            foreach ($photoFiles as $body => $file) {
                $planImage = new PlanImage();

                $path = ImageHelper::store($file, "plan/$plan->id");
                // $path = $file->store('plan', 's3');
                // dd(Storage::disk('s3')->url($path));
                $planImage->plan_id = $plan->id;
                $planImage->image = $path;
                $planImage->body = $body;
            
                $planImage->save();
                DB::commit();
            }
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }
}

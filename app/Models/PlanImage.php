<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanImage extends Model
{
    protected $table = 'plan_images';

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}

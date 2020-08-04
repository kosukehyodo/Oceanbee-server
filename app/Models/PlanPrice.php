<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanPrice extends Model
{
    protected $table = 'plan_prices';

    protected $fillable = [
        'plan_id',
        'charge_id',
        'price'
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}

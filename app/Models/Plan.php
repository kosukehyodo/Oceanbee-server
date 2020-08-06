<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plans';

    protected $fillable = [
        'title',
        'body',
        'category',
        'prefecture',
        'address'
    ];

    public function planImages()
    {
        return $this->hasMany(PlanImage::class);
    }

    public function planPrices()
    {
        return $this->hasMany(PlanPrice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

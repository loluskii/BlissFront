<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'interval',
        'interval_count',
        'description',
        'delivery_fee',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subcriptions()
    {
        return $this->hasMany(PlanSubscription::class);
    }
}

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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NINLocation extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function service_center(){
        return $this->hasMany(NINServiceCenters::class);
    }
}

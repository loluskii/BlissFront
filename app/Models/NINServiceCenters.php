<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NINServiceCenters extends Model
{
    use HasFactory;
    protected $fillable = ['service_center','location_id'];

    public function location (){
        return $this->belongsTo(NINLocation::class);
    }
}

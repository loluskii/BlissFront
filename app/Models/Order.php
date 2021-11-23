<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'shipping_first_name',
        'shipping_last_name' ,
        'shipping_street_address'  ,
        'shipping_city' ,
        'shipping_state' ,
        'shipping_phone_number' ,
        'shipping_apartment_suite' ,
        'plan' ,
        'shipping_postcode',
    ];


    public function items(){
        return $this->belongsToMany(Product::class, 'order_items','order_id','product_id')->withPivot('quantity','price');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

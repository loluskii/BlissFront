<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'shipping_fname',
        'shipping_lname' ,
        'shipping_address'  ,
        'shipping_city' ,
        'shipping_state' ,
        'shipping_phone' ,
        'shipping_landmark' ,
        'plan' ,
        'shipping_zipcode',
        'pm_fname',
        'pm_lname',
        'pm_country',
        'pm_phone_no',
        'pm_bank_name',
        'pm_acct_no',
        'has_pm_package',
    ];


    public function items(){
        return $this->belongsToMany(Product::class, 'order_items','order_id','product_id')->withPivot('quantity','price');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

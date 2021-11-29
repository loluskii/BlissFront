<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'price',
        'product_img',
        'is_featured',
        'product_ref',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function store(){
        return
    }
}

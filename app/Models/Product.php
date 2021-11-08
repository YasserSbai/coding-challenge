<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
       'name',
       'description',
       'price',
       'image'
    ];

    public function categories(){
        return $this->belongsToMany(Category::class,'products_categories')->using('App\Models\ProductCategory');
    } 
}

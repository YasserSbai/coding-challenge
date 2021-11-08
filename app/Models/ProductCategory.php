<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductCategory extends Pivot
{
    use HasFactory;

    public $table = "products_categories";

    protected $fillable = [
        'category_id',
        'product_id'
    ];
}

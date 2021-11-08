<?php

namespace App\Repository\Impl;

use App\Models\Product;
use App\Repository\Impl\EloquetRepositoryImpl;
use App\Repository\IProductRepository;

class ProductRepositoryImpl extends EloquetRepositoryImpl implements IProductRepository {
    
    /**
    * ProductRepositoryImpl constructor.
    *
    * @param Product $model
    */
   public function __construct( Product $model)
   {
       parent::__construct($model);
   }
}
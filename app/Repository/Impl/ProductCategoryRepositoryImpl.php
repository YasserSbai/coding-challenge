<?php

namespace App\Repository\Impl;

use App\Models\Product;
use App\Repository\Impl\EloquetRepositoryImpl;
use App\Repository\IProductCategoryRepository;
use App\Repository\IProductRepository;

class ProductCategoryRepositoryImpl extends EloquetRepositoryImpl implements IProductCategoryRepository {
    
    /**
    * ProductCategoryRepositoryImpl constructor.
    *
    * @param Product $model
    */
   public function __construct( Product $model)
   {
       parent::__construct($model);
   }
}
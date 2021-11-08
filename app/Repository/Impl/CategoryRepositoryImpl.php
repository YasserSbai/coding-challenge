<?php

namespace App\Repository\Impl;

use App\Models\Category;
use App\Repository\ICategoryRepository;
use App\Repository\Impl\EloquetRepositoryImpl;

class CategoryRepositoryImpl extends EloquetRepositoryImpl implements ICategoryRepository {
    
    /**
    * CategoryRepositoryImpl constructor.
    *
    * @param Category $model
    */
   public function __construct( Category $model)
   {
       parent::__construct($model);
   }
}
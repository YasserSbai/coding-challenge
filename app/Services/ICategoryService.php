<?php   

namespace App\Services;   


interface ICategoryService
{     
    public function findCategory($inputs);
    public function createCategory($inputs);
    public function getCategories();
}
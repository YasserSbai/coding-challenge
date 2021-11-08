<?php 

namespace App\Services;

use Illuminate\Http\JsonResponse;


interface IProductService{

    public function createProduct($inputs);
    public function affectCategoriesToProduct($product, $inputs);
    public function getProducts();
}
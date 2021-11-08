<?php   

namespace App\Services\Impl;

use App\Models\Product;
use App\Repository\IProductRepository;
use App\Services\ICategoryService;
use App\Services\IProductService;
use Exception;

class ProductServiceImpl implements IProductService
{     

    private $productRepository;
    private $categoryService;

    public function __construct(IProductRepository $productRepository,
    ICategoryService $categoryService)
    {   
        $this->categoryService = $categoryService;
        $this->productRepository = $productRepository;
    }
    
    
    public function createProduct($inputs){
        return $this->productRepository->create($inputs);
    }

    public function affectCategoriesToProduct($product,$inputs){
        $categories = array();
        if(!empty($inputs) && isset($inputs)){
            foreach ($inputs as $category) {
                $categoryModel = $this->categoryService->findCategory(array('id' => $category['id']));
                if(!isset($categoryModel) || empty($categoryModel)){
                    Throw new Exception('No Category Found with id' . $category['id']);
                }
                else{
                    array_push($categories, $category['id']);
                } 
            }
            $product->categories()->sync($categories);
        }
        return $categories;
    }
    public function getProducts(){
        return $this->productRepository->all();
    }


}
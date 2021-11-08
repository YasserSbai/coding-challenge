<?php   

namespace App\Services\Impl;

use App\Repository\ICategoryRepository;
use App\Services\ICategoryService;
use Exception;

class CategoryServiceImpl implements ICategoryService
{   
    private $categoryRepository;

    public function __construct(ICategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    
    public function findCategory($inputs){
        return $this->categoryRepository->find($inputs['id']);
    }

    public function createCategory($inputs){
        if(isset($inputs['category_parent_id']) && !empty($inputs['category_parent_id'])){
            $parentId = $inputs['category_parent_id'];
            $categoryParent = $this->findCategory(array('id' => $parentId));
            if(!isset($categoryParent)  || empty($categoryParent)){
                Throw new Exception('No Category Parent Found');
            }
        }
        return $this->categoryRepository->create($inputs);
    }    

    public function getCategories(){
        return $this->categoryRepository->all();
    }
}
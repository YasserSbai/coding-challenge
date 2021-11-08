<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Services\IRequestResponseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class CategoryController extends Controller {

    private $requestResponseService;

    public function __construct(IRequestResponseService $requestResponseService)
    {
       $this->requestResponseService = $requestResponseService;
    }

    /**
     * Handles Test Request.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function createCategory(Request $request): JsonResponse{   
        return  $this->requestResponseService->buildResponse(true, 0000,[], 'No Error');
    }

    public function getCategories(Request $request): JsonResponse{   
        try {
            $products = $this->productService->getcategories();
            return  $this->requestResponseService->buildResponse(true, 0000, 
            array(
                "categories" => $categories,
            ), 'No Error');
        }
        catch (\Throwable $th) {
            return  $this->requestResponseService->buildResponse(false, 2001,[],$th->getMessage());
        }
    }
}

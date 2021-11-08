<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Services\Impl\ProductServiceImpl;
use App\Services\IProductService;
use App\Services\IRequestResponseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller {

    private $requestResponseService;
    private $productService;

    public function __construct(IRequestResponseService $requestResponseService,
    IProductService $productService)
    {   
       $this->productService = $productService;
       $this->requestResponseService = $requestResponseService;
    }

    /**
     * Handles Test Request.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function createProduct(Request $request): JsonResponse{   
        $inputs = $request->all();
        $validator = validator()->make($inputs, [
            'product' => 'required|array',
                'product.name'    => 'required|string',
                'product.description' => 'required|string',
                'product.price' => 'required|numeric',
                'product.url' => 'required|string',
            'cateogies' => 'array',
                'cateogies.*.id' => 'numeric'
        ]); 
        if ($validator->fails()) {
            return $this->requestResponseService->buildResponse(false,Response::HTTP_BAD_REQUEST,$validator->errors(),'Bad Request');
        }
        try {
            $product = $this->productService->createProduct($inputs['product']);
            $categories = $this->productService->affectCategoriesToProduct($product, $inputs['categories']);
            return  $this->requestResponseService->buildResponse(true, 0000, 
            array(
                "product" => $product,
                "categories" => $categories
            ), 'No Error');
        }
        catch (\Throwable $th) {
            return  $this->requestResponseService->buildResponse(false, 2001,[],$th->getMessage());
        }
    }

      
        public function getProducts(Request $request): JsonResponse{   
            try {
                $products = $this->productService->getProducts();
                return  $this->requestResponseService->buildResponse(true, 0000, 
                array(
                    "products" => $products,
                ), 'No Error');
            }
            catch (\Throwable $th) {
                return  $this->requestResponseService->buildResponse(false, 2001,[],$th->getMessage());
            }
        }
            
}

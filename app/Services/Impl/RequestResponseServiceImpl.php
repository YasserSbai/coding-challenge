<?php 

namespace App\Services\Impl;

use App\Services\IRequestResponseService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;

class RequestResponseServiceImpl implements IRequestResponseService{

    /**
     * Handles Login Request.
     *
     *
     * @return JsonResponse
     */
    
    public function buildResponse($state, $status, $data, $message){
        return response()->json(
                ['state'   => $state,
                 'status' => $status,
                 'data' => $data, 
                 'message' => $message
                ],200
        );
    }
}
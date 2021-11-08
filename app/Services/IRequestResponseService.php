<?php 

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;

interface IRequestResponseService{

    /**
     * Handles Login Request.
     *
     *
     * @return JsonResponse
     */
    public function buildResponse($state, $status, $data, $message);
}
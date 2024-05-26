<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class Controller
{
    protected function responseSuccess($data): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }

    protected function responseFail($data, $error, $status): JsonResponse
    {
        return response()->json([
            'success' => false,
            'error' => $error,
            'data' => $data
        ], $status);
    }
}

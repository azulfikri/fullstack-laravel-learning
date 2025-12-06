<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success($data = null, $message = "Success", $statusCode = 200)
    {
        return response()->json([
            'code' => $statusCode,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }
    public static function error($message = "Error", $statusCode = 400)
    {
        return response()->json([
            'code' => $statusCode,
            'message' => $message,
            'data' => null
        ], $statusCode);
    }
}

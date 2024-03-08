<?php

namespace App\Helpers;

class ResponseWith
{
    public static function success($data = null, $statusCode = 200)
    {
        return response()->json([
            'success' => true,
            'message' => 'Success!',
            'data' => $data
        ], $statusCode);
    }

    public static function error($error, $statusCode = 400)
    {
        return response()->json([
            'success' => false,
            'message' => 'Something went Wrong :C',
            'error' => $error->getMessage(),
        ], $statusCode);
    }

    public static function unauthorized($message = 'Unauthorized')
    {
        return self::error($message, 401);
    }

    public static function forbidden($message = 'Forbidden')
    {
        return self::error($message, 403);
    }

    public static function notFound($message = 'Not Found')
    {
        return self::error($message, 404);
    }

    public static function internalServerError($message = 'Internal Server Error')
    {
        return self::error($message, 500);
    }
}
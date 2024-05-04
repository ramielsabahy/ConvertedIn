<?php
if (!function_exists("customResponse")) {
    function customResponse($data, $message, $code): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data'  => $data,
            'message'  => $message,
        ], $code);
    }
}

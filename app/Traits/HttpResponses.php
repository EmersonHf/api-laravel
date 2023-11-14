<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\MessageBag;

trait HttpResponses
{
    public function response($message, $status = 200, array |Model  $data = [])
    {
        return response()->json([
            'message' =>  $message,
            'status' => $status,
            'data' =>  $data
        ], $status);
    }

    public function error($message, $status = 500,  array|MessageBag $errors = [], $data = [])
    {
        return response()->json(
            [
                'errors' => $errors,
                'message' => $message,
                'data' => $data
            ],
            $status
        );
    }
}

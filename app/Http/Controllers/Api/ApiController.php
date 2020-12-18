<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected function response($data, $code, $headers, $message)
    {
        $head = ['head' => $headers];
        $mes = ['message' => $message];

        return response()->json($data, $code, $head,$message);
    }
}

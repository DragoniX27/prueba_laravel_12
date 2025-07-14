<?php

namespace App\Http\Services\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExampleServices
{
    public function index(Request $request)
    {
        // Example method to handle index requests
        return response()->json(['message' => 'Index method called']);
    }
}
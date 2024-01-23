<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    // categories
    public function categories(){

        $categories = $this->service->categories();

        return response()->json([
            'data' => $categories,
            'status' => true
        ], 200);
    }
}

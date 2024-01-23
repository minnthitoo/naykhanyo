<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\PoemService;
use Illuminate\Http\Request;

class PoemController extends Controller
{
    protected $service;

    public function __construct(PoemService $service)
    {
        $this->service = $service;
    }

    // poems
    public function poems(){
        $poems = $this->service->get_poems_from_api();
        return response()->json([
            'data' => $poems
        ], 200);
    }
}

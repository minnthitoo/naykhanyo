<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Services\LikeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    protected $service;

    public function __construct(LikeService $service)
    {
        $this->service = $service;
    }

    // like
    public function like_unlike(Request $request){
        $result = $this->service->like($request->except('_token'));
        if($result){
            return response()->json([
                'success' => true,
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'An error occured'
            ]);
        }
    }
}

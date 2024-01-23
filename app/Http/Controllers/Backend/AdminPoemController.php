<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\PoemService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminPoemController extends Controller
{

    private $service;

    public function __construct(PoemService $service)
    {
        $this->service = $service;
    }

    // create
    public function create(){
        return view('backend.poem.create');
    }

    // store
    public function store(Request $request){
        $this->poem_validation($request);
        $result = $this->service->store($request->except('_token'));
    }

    // validation
    private function poem_validation($data){
        Validator::make($data->all(), [
            'title' => 'required|unique:poems,title,'.$data->id,
            'content' => 'required',
            'image' => 'required|mimes:png,jpg',
            'category_id' => 'required',
        ])->validate();
    }
}

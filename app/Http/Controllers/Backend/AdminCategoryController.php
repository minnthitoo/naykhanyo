<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminCategoryController extends Controller
{

    private CategoryService $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    // manage
    public function manage(){
        return view('backend.category.manage');
    }

    // store
    public function store(Request $request){
        $this->categoryValidation($request);
        $result = $this->service->store($request->except('_token'));
        if($result){
            Toastr::success('Created successfully', 'Category Create');
            return redirect()->back();
        }
    }

    // validation
    private function categoryValidation($data){
        Validator::make($data->all(), [
            'name' => 'required|unique:categories,name,'.$data->id
        ])->validate();
    }
}

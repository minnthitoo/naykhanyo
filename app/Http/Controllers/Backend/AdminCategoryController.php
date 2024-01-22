<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\CategoryService;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

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

    // get categories
    public function get_categories(){
        $categories = Category::query();
        return DataTables::of($categories)
        ->editColumn('status', function($each){
            return $each->status == 1 ? '<div class="mb-2 me-2 badge rounded-pill bg-success status-pointer">Active</div>' : '<div class="mb-2 me-2 badge rounded-pill bg-danger status-pointer">Inactive</div>';
        })
        ->addColumn('action', function($each){
            return '
            <div class="dropdown d-inline-block">
                <button type="button" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown" class="mb-2 me-2 dropdown-toggle btn btn-warning">Warning</button>
                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu">
                    <button type="button" tabindex="0" class="dropdown-item">Menus</button>
                    <button type="button" tabindex="0" class="dropdown-item" data-id="'. $each->id .'" data-status="'. ($each->status == 1 ? 0 : 1) .'">Status Change</button>
                </div>
            </div>
            ';
        })
        ->rawColumns(['status', 'action'])
        ->make();
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

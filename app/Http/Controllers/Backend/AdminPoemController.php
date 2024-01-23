<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Poem;
use App\Services\PoemService;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

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
        $this->service->store($request->except('_token'));
        Toastr::success('Created Successfully', 'Poem create');
        return redirect()->back();
    }

    // list
    public function list(){
        return view('backend.poem.list');
    }

    // get_data
    public function get_data(){
        $poems = Poem::query()->orderBy('id', 'desc');
        return DataTables::of($poems)
        ->editColumn('image', function($each){
            return '<img src="'. $each->image .'" height="50px">';
        })
        ->editColumn('status', function($each){
            return $each->status == 1 ? '<div class="mb-2 me-2 badge rounded-pill bg-success status-pointer">Active</div>' : '<div class="mb-2 me-2 badge rounded-pill bg-danger status-pointer">Inactive</div>';
        })
        ->addColumn('action', function($each){
            return '
                <div class="dropdown d-inline-block">
                    <button type="button" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown" class="mb-2 me-2 dropdown-toggle btn btn-warning">Action</button>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu" style="">
                        <button type="button" tabindex="0" class="dropdown-item edit" data-bs-toggle="modal" data-bs-target="#modal">Edit</button>
                        <div class="modal-data" style="display: none;">
                            <div class="row mb-2">
                                <div class="col">
                                    <input type="text" name="title" id="title" value="'. $each->title .'" readonly class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <pre name="content" style="overflow: hidden;" id="content" class="form-control">'. $each->content .'</pre>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <img src="'. $each->image .'" width="100%" alt="">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <input type="text" name="category" id="category" value="'. $each->category_id .'" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="button" tabindex="0" class="dropdown-item status" data-id="'. $each->id .'" data-status="'. ($each->status == 1 ? 0 : 1) .'">Status Change</button>
                        <button type="button" tabindex="0" class="dropdown-item">Settings</button>
                    </div>
                </div>
            ';
        })
        ->rawColumns(['image', 'status', 'action'])
        ->make();
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

<?php

namespace App\Repositories;

use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\DB;

class CategoryRepository{

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function store($data){
        DB::beginTransaction();
        try{
            $category = new Category();
            $category->name = $data['name'];
            $category->save();
            DB::commit();
            return true;
        }catch(Exception $e){
            DB::rollBack();
            return false;
        }
    }

    public function status_change($data, $id){
        $category = Category::find($id);
        $category->fill($data)->save();
        return true;
    }

    public function categories(){
        $categories = Category::select('id', 'name')->where('status', 1)->orderBy('name')->get();
        return $categories;
    }

}

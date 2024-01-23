<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService{
    private CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    // store
    public function store($data){
        return $this->repository->store($data);
    }

    // status change
    public function status_change($data, $id){
        return $this->repository->status_change($data, $id);
    }

    // get categories
    public function categories(){
        return $this->repository->categories();
    }

    // get category
    public function category($id){
        return $this->repository->category($id);
    }

}

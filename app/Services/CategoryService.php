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

}

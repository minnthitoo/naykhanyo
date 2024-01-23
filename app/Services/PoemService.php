<?php

namespace App\Services;

use App\Repositories\PoemRepository;

class PoemService{
    private $repository;

    public function __construct(PoemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store($data){
        $this->repository->store($data);
    }

    public function status_change($data, $id){
        return $this->repository->status_change($data, $id);
    }

}

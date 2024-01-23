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
        return $this->repository->store($data);
    }

}

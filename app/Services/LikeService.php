<?php

namespace App\Services;

use App\Repositories\LikeRepository;

class LikeService{
    protected $repository;

    public function __construct(LikeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function like($data){
        return $this->repository->like($data);
    }

}

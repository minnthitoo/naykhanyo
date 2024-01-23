<?php

namespace App\Repositories;

use App\Models\Poem;

class PoemRepository{
    private $poem;

    public function __construct(Poem $poem)
    {
        $this->poem = $poem;
    }

    public function store($data){
        dd($data);
    }

}

<?php

namespace App\Repositories;

use App\Models\Poem;

class PoemRepository{
    protected $poem;

    public function __construct(Poem $poem)
    {
        $this->poem = $poem;
    }

    public function store($data){
        $data['image'] = upload_image($data['image'], 'images/poems/');
        $poem = new Poem();
        $poem->fill($data)->save();
    }

}

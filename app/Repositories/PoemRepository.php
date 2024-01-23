<?php

namespace App\Repositories;

use App\Models\Poem;
use Exception;

class PoemRepository{
    protected $poem;

    public function __construct(Poem $poem)
    {
        $this->poem = $poem;
    }

    public function store($data){
        $data['image'] = upload_image($data['image'], '/images/poems/');
        $poem = new Poem();
        $poem->fill($data)->save();
    }

    public function status_change($data, $id){
        try{

            $poem = Poem::find($id);
            $poem->fill($data)->save();
            return true;

        }catch(Exception $e){
            return false;
        }
    }

    public function get_poems_from_api(){
        $poems = Poem::with(['category' => function($query){
            $query->select('id', 'name');
        }])->select('id', 'title', 'content', 'image', 'category_id', 'created_at as date')->where('status', 1)->orderBy('id', 'desc')->get();
        return $poems;
    }

}

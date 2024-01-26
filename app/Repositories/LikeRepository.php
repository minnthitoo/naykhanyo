<?php

namespace App\Repositories;

use App\Models\Like;
use Exception;
use Illuminate\Support\Facades\Auth;

class LikeRepository{
    protected $like;

    public function like($data){
        try{

            $data['user_id'] = Auth::user()->id;

            $check = Like::where($data)->first();

            if(!$check){

                $like = new Like();
                $like->fill($data)->save();

            }else{

                $like = Like::find($check->id);
                $like->delete();

            }

            return true;

        }catch(Exception $e){
            logger($e);
            return false;
        }
    }

}

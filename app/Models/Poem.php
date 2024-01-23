<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poem extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'image',
        'category_id',
        'status'
    ];

    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}

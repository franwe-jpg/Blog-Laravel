<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Post;


class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name'
    ];

    public function post(){
        return $this->hasMany(Post::class);
    }
}

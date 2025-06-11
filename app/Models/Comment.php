<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use hasFactory;

    protected $fillable = [
        'title',
        'content',
        'post_id',
        'user_id',
        
    ];

    protected $table = 'comments';
    
    public function post(){
        return $this->BelongsTo(Post::class);
    }

    public function user(){
        return $this->BelongsTo(User::class);
    }
}

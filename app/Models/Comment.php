<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use hasFactory;

    protected $fillable = [
        'title',
        'content',
        
    ];

    protected $table = 'comments';
    
}

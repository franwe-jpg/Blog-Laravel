<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Container\Attributes\Auth;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class CommentController extends Controller
{
 
    public function store(StoreCommentRequest $request, Post $post)
    {
        Comment::create([
            'title' => $request->title,
            'content' => $request->content,
            'post_id' => $post->id,
            'user_id' => auth()->user()->id,

        ]);
        return redirect()->back();
    }


    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->update($request->all());
        return redirect()->back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }
}

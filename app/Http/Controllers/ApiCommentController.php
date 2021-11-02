<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiCommentController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'text' => 'required',
        ]);

        $post = Post::findOrFail($request->post_id);
        $comment = $post->comments()->create($request->all());

        return $request->wantsJson()
            ? new JsonResponse( $comment, 200)
            :  $comment;
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'text' => 'required',
        ]);

        $comment = Comment::findOrFail($request->id)->update($request->all());

        return $request->wantsJson()
            ? new JsonResponse( $comment, 200)
            :  $comment;
    }

    public function delete(Request $request){
        Comment::findOrFail($request->id)->delete();

        return $request->wantsJson()
            ? new JsonResponse( ['Удалено'], 200)
            :  true;
    }
}

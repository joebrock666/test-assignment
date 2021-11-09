<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiPostController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $post = Post::create($request->all());

        return $request->wantsJson()
            ? new JsonResponse( $post, 200)
            :  $post;
    }

    public function update(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $post = Post::findOrFail($request->id)->update($request->all());

        return $request->wantsJson()
            ? new JsonResponse( $post, 200)
            :  $post;
    }

    public function delete(Request $request){
        Post::findOrFail($request->id)->delete();

        return $request->wantsJson()
            ? new JsonResponse( ['Удалено'], 200)
            :  true;
    }

    public function posts(Request $request){
        $posts = Post::with(['comments'])->get();

        return $request->wantsJson()
            ? new JsonResponse( $posts, 200)
            :  $posts;
    }

    public function post(Request $request){
        $post = Post::ith(['comments'])->findOrFail($request->id);

        return $request->wantsJson()
            ? new JsonResponse( $post, 200)
            :  $post;
    }
}

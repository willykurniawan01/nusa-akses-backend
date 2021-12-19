<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = [];
        $post = Post::getAllPost();

        //manipulate the url of picture
        foreach ($post as  $eachPost) {
            $eachPost->picture = url(Storage::url($eachPost->picture));
            array_push($result, $eachPost);
        }


        return response()->json($result, 200);
    }

    public function search(Request $request)
    {
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::getDetailPost($id);
        $post->picture = url(Storage::url($post->picture));
        return response()->json($post, 200);
    }
}

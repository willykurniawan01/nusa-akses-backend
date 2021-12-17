<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    public function savePost($request)
    {
        // dd($request->file('picture'));
        if (!$request->hasFile('picture')) {
            $post = new self;
            $post->judul = $request->judul;
            $post->slug = $request->slug;
            $post->content = $request->content;

            if ($post->save()) {
                return true;
            }
        } else {
            $path = $request->file('picture')->store('post', 'public');
            $post = new self;
            $post->judul = $request->judul;
            $post->slug = $request->slug;
            $post->content = $request->content;
            $post->picture = $path;

            if ($post->save()) {
                return true;
            }
        }

        return false;
    }

    public function updatePost($request, $id)
    {
        // dd($request->file('picture'));
        if (!$request->file('picture')) {
            $post = self::find($id);
            $post->judul = $request->judul;
            $post->slug = $request->slug;
            $post->content = $request->content;

            if ($post->save()) {
                return true;
            }
        } else {

            //save picture
            $path = $request->file('picture')->store('post', 'public');

            //save data
            $post = self::find($id);
            $post->judul = $request->judul;
            $post->slug = $request->slug;
            $post->content = $request->content;
            $post->picture = $path;

            if ($post->save()) {
                return true;
            }
        }
        return false;
    }



    public function getAllPost()
    {
        return self::all();
    }

    public function getAllPostForDatatable()
    {
        $query = self::all();
        return DataTables::of($query)->toJson();
    }



    public function getDetailPost($id)
    {
        $post = self::find($id);
    }
}

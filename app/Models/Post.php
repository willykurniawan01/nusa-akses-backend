<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    public function savePost($request)
    {
        $post = new self;
        $post->judul = $request->judul;
        $post->slug = $request->slug;
        $post->content = $request->content;

        if ($post->save()) {
            return true;
        } else {
            return false;
        }
    }

    public static function getAllPost()
    {
        return DataTables::of(self::all())->make(true);
    }
}

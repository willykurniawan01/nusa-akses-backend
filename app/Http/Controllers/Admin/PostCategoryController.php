<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Models\PostCategory;
use App\Http\Controllers\Controller;

class PostCategoryController extends Controller
{
    public function saveCategory(Request $request)
    {
        $data = new PostCategory;
        $data->name = $request->name;
    }

    public function getPostCategory()
    {
        $data = PostCategory::all();
        return response()->json($data, 200);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostCategory;

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

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $countPost = Post::all()->count();
        return view("pages.admin.home", compact("countPost"));
    }
}

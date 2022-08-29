<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\ImageSlider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $imageSlider = ImageSlider::all();
        return view("pages.guest.index", compact("imageSlider"));
    }
}

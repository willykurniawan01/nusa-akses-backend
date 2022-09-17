<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\ImageSlider;
use App\Models\Page;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $imageSliders = ImageSlider::all();
        $services = Service::with("page")->get();
        return view("pages.guest.index", compact("imageSliders", "services"));
    }

    public function berita()
    {
        $berita = Post::paginate(6);
        return view("pages.guest.berita", compact("berita"));
    }


    public function page($id)
    {
        $page = Page::find($id);
        return view("pages.guest.page", compact("page"));
    }

    public function perusahaan()
    {
        return view("pages.guest.profilePerusahaan");
    }
}

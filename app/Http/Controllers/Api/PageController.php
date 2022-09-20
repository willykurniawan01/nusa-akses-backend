<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{

    public function index()
    {
        $result = [];
        $result['data'] = [];

        $pages = Page::whereDoesntHave("services")->get();

        foreach ($pages as $eachPage) {
            $eachPage->picture = url(Storage::url($eachPage->picture));
            array_push($result["data"], $eachPage);
        }


        return response()->json($result);
    }


    public function show($id)
    {
        $result = [];
        $result['data'] = [];

        $page = Page::find($id);
        $page->picture = url(Storage::url($page->picture));
        $result["data"] = $page;

        return response()->json($result);
    }
}

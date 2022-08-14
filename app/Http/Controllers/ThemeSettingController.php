<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeSettingController extends Controller
{
    public function index()
    {
        return view("pages.theme_settings.index");
    }

    public function saveSetting(Request $request)
    {
        dd($request->all());
    }
}

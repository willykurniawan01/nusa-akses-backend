<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ThemeSetting;

class ThemeSettingController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $themeSettings = ThemeSetting::where("user_id", $user->id)->get();

        if ($themeSettings->count() == 0) {
            $themeSetting = new ThemeSetting;
            $themeSetting->user_id = $user->id;
            $themeSetting->name = "color_scheme";
            $themeSetting->value = "light";
            $themeSetting->save();

            $themeSetting = new ThemeSetting;
            $themeSetting->user_id = $user->id;
            $themeSetting->name = "sidebar";
            $themeSetting->value = "light";
            $themeSetting->save();

            $themeSettings = ThemeSetting::where("user_id", $user->id)->get();
        }


        return view("pages.admin.theme_settings.index", compact("themeSettings"));
    }

    public function save(Request $request)
    {
        $user = auth()->user();
        $themeSettings = ThemeSetting::where("user_id", $user->id)->get();
        foreach ($themeSettings as $eachSetting) {
            if ($eachSetting->name == "color_scheme") {
                $eachSetting->value = $request->color_scheme;
            } else {
                $eachSetting->value = $request->sidebar;
            }
            $eachSetting->save();
        }

        return redirect()
            ->back()
            ->withToastSuccess("Berhasil menyimpan perubahan!");
    }
}

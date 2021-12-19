<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;

class SettingController extends Controller
{
    public function index()
    {

        return view('pages.settings.settingIndex');
    }

    public function companySetting()
    {
        $setting = Settings::getSetting('perusahaan');
        return view('pages.settings.settingPerusahaan', compact('setting'));
    }

    public function saveSetting(Request $request)
    {
        foreach ($request->except('_token') as $index => $eachSetting) {
            Settings::saveSetting($index, $eachSetting);
        }
        return redirect()->back()
            ->withToastSuccess("Berhasil menerapkan pengaturan!");
    }
}

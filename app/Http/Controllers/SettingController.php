<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    public function indexAccount()
    {
        $user = Auth::user();
        return view('pages.account_settings.indexAccountSetting', compact("user"));
    }

    public function updateAccount(Request $request, User $user)
    {
        $rules  = [
            "name" => "required",
            "password" => "same:password_confirm"
        ];


        $validation = Validator::make($request->all(), $rules);

        if (!$validation->fails()) {
            $user->name = $request->name;
            if ($request->password != "") {
                $user->password = bcrypt($request->password);
            }
            $user->save();
        }

        return redirect()->route("settings.index")
            ->withToastSuccess("Berhasil mengupdate pengaturan user!");
    }
}

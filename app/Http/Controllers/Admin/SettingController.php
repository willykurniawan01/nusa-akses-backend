<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function indexAccount()
    {
        $user = Auth::user();
        return view('pages.admin.account_settings.index', compact("user"));
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

        return redirect()->route("setting.index")
            ->withToastSuccess("Berhasil mengupdate pengaturan user!");
    }
}

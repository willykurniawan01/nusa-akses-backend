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

        $messages  =  [
            "name.required" => "Nama tidak boleh kosong!",
            "password.same" => "Password dan konfirmasi password harus sama!"
        ];

        $validation = Validator::make($request->all(), $rules, $messages);

        if (!$validation->fails()) {
            $user->name = $request->name;
            if ($request->password != "") {
                $user->password = bcrypt($request->password);
            }

            if ($request->hasFile("picture")) {
                $path = $request->file("picture")->store("user", "public");
                $user->profile_pic = $path;
            }
            if ($user->save()) {
                return redirect()->back()
                    ->withToastSuccess("Berhasil mengupdate pengaturan user!");
            }
        } else {
            return redirect()->back()
                ->withToastError($validation->errors()->first());
        }
    }
}

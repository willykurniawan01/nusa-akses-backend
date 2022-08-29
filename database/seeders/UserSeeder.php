<?php

namespace Database\Seeders;

use App\Models\ThemeSetting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = Role::create(['name' => 'Super Admin']);

        $user = User::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'name' => 'admin',
        ]);

        $user->assignRole($role);

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
        }
    }
}

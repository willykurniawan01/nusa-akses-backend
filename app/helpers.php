<?php

use App\Models\ThemeSetting;

function getThemeSettings()
{
    $user = auth()->user();
    $themeSettings = ThemeSetting::where("user_id", $user->id)->get();

    return $themeSettings;
}

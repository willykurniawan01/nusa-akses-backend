<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $table = 'settings';

    protected static $setting_perusahaan = [
        [
            'type' => 'perusahaan',
            'name' => 'nama_perusahaan',
            'title' => 'Nama Perusahaan',
            'is_textarea' => false
        ],
        [
            'type' => 'perusahaan',
            'name' => 'visi_perusahaan',
            'title' => 'Visi Perusahaan',
            'is_textarea' => true
        ],
        [
            'type' => 'perusahaan',
            'name' => 'misi_perusahaan',
            'title' => 'Misi Perusahaan',
            'is_textarea' => true
        ],

    ];



    public static function saveSetting($name, $value)
    {
        $setting = self::where("name", "=", $name)->first();
        $setting->value = $value;

        if ($setting->save()) {
            return true;
        }

        return false;
    }

    public static function getSetting($type)
    {
        switch ($type) {
            case 'perusahaan':
                $setting = self::where('type', "=", $type)->get();
                if ($setting->count() != 0) {
                    return $setting;
                } else {
                    $allSetting = [];
                    foreach (self::$setting_perusahaan as $eachSetting) {
                        $setting = new self;
                        $setting->type = $eachSetting['type'];
                        $setting->name = $eachSetting['name'];
                        $setting->title = $eachSetting['title'];
                        $setting->is_textarea = $eachSetting['is_textarea'];
                        $setting->value = null;
                        if ($setting->save()) {
                            array_push($allSetting, $setting);
                        }
                    }
                    return $allSetting;
                }
                break;
        }
    }
}

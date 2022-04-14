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
            'name' => 'sejarah_perusahaan',
            'title' => 'Sejarah Perusahaan',
            'is_textarea' => true
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

        [
            'type' => 'perusahaan',
            'name' => 'tentang_perusahaan',
            'title' => 'Tentang Perusahaan',
            'is_textarea' => true
        ],
        [
            'type' => 'perusahaan',
            'name' => 'pimpinan_perusahaan',
            'title' => 'Pimpinan Perusahaan',
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
                $allSetting = [];
                foreach (self::$setting_perusahaan as $eachSetting) {
                    if (self::where('name', "=", $eachSetting['name'])->count() != 0) {
                        $setting = self::where('name', "=", $eachSetting['name'])->first();
                        array_push($allSetting, $setting);
                    } else {
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
                }
                return $allSetting;
                break;
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageSlider extends Model
{
    use HasFactory;

    protected $table = 'image_sliders';

    public static function getAllSlider()
    {
        $slider = ImageSlider::all();

        return $slider;
    }

    public static function saveImage($request)
    {
        $path = $request->file('picture')->store('sliders', 'public');

        $sliders = new self;
        $sliders->picture = $path;

        if ($sliders->save()) {
            return true;
        }

        return false;
    }

    public static function deleteImage($id)
    {
        $sliders = self::findOrFail($id);

        if ($sliders->delete()) {
            return true;
        }

        return false;
    }
}

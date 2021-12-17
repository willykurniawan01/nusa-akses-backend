<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageSlider extends Model
{
    use HasFactory;

    protected $table = 'image_sliders';

    public function getAllsliders()
    {
        $slider = ImageSlider::all();

        return $slider;
    }

    public function saveImage($request)
    {
        $path = $request->file('picture')->store('sliders', 'public');

        $sliders = new self;
        $sliders->picture = $path;

        if ($sliders->save()) {
            return true;
        }

        return false;
    }

    public function deleteImage($id)
    {
        $sliders = self::findOrFail($id);
    }
}

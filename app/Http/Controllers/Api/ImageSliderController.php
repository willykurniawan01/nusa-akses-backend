<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ImageSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageSliderController extends Controller
{
    public function index()
    {

        $result = [];
        $result['data'] = [];

        $imageSliders = ImageSlider::getAllSlider();

        foreach ($imageSliders as $eachSlider) {
            $eachSlider->picture = url(Storage::url($eachSlider->picture));
            array_push($result['data'], $eachSlider);
        }
        return response()->json($result, 200);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImageSlider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index()
    {
        return view('pages.admin.slider.index');
    }

    public function store(Request $request)
    {
        $result = [];

        if (!$request->hasFile('picture')) {
            return response()->json('Silahkan pilih gambar terlebih dahulu!', 200);
        } else {
            $saveImage = ImageSlider::saveImage($request);
            if (!$saveImage) {
                $result['message'] = "Gagal menyimpan gambar!";
                return response()->json($result, 404);
            }

            $result['message'] = "Berhasil menyimpan gambar!";
            return response()->json($result, 200);
        }
    }


    public function destroy(Request $request)
    {
        $result = [];

        $deleteImage = ImageSlider::deleteImage($request->id);
        if (!$deleteImage) {
            $result['message'] = "Gagal menghapus gambar!";
            return response()->json($result, 404);
        }

        $result['message'] = "Berhasil menghapus gambar!";
        return response()->json($result, 200);
    }

    public function getAllslider()
    {
        $sliders = ImageSlider::getAllslider();

        if ($sliders) {
            return response()->json($sliders, 200);
        }

        return response()->json("", 404);
    }
}

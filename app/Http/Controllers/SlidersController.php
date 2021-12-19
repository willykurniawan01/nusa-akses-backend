<?php

namespace App\Http\Controllers;

use App\Models\ImageSlider;
use Illuminate\Http\Request;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.sliders.indexSliders');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    public function getAllsliders()
    {
        $sliders = ImageSlider::getAllsliders();

        if ($sliders) {
            return response()->json($sliders, 200);
        }

        return response()->json("", 404);
    }
}

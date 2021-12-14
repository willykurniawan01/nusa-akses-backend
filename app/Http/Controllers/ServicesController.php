<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.services.indexServices');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.services.createServices');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required'
        ];

        $messages = [
            'name.required' => 'nama services tidak boleh kosong!',
            'description.required' => 'deskripsi services tidak boleh kosong!'
        ];
        $validation = Validator::make($request->all(), $rules, $messages);

        if (!$validation->fails()) {
            $services = Services::saveServices($validation->validated());

            if ($services) {
                return redirect()
                    ->route('services.index')
                    ->withToastSuccess("Berhasil menambahkan services baru!");
            }

            return redirect()->back()
                ->withToasError("Gagal menambahkan data!");
        } else {
            return redirect()->back()
                ->withErrors($validation)
                ->withInput()
                ->withToastError('Periksa kembali input!');
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
        // dd($request->all());
        $result = [];
        $services = Services::findOrFail($request->id);

        if ($services->delete()) {
            $result["message"] = "Berhasil menghapus data!";
            return response()->json($result, "200");
        } else {
            $result["message"] = "Gagal menghapus data!";
            return response()->json($result, "404");
        }
    }



    public function getAllServicesForDataTable()
    {
        $services = Services::getAllServicesForDatatable();

        return $services;
    }
}

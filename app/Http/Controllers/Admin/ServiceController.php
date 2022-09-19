<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Service;
use App\Models\Services;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.service.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = Page::all();
        return view('pages.service.create', compact("page"));
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
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ];

        $messages = [
            'name.required' => 'nama services tidak boleh kosong!',
            'picture.image' => 'file harus berupa gambar!',
            'picture.mimes' => 'ekstensi file tidak di support!',
        ];
        $validation = Validator::make($request->all(), $rules, $messages);

        if (!$validation->fails()) {
            $services = Service::saveService($request);

            if ($services) {
                return redirect()
                    ->route('service.index')
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services = Service::findOrFail($id);
        $page = Page::all();

        return view('pages.service.edit', compact('services', 'page'));
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
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $messages = [
            'name.required' => 'nama services tidak boleh kosong!',
            'description.required' => 'deskripsi services tidak boleh kosong!',
            'picture.image' => 'file harus berupa gambar!',
            'picture.mimes' => 'ekstensi file tidak di support!',
            'picture.max' => 'ukuran gambar tidak boleh lebih dari 2mb!',
        ];
        $validation = Validator::make($request->all(), $rules, $messages);

        if (!$validation->fails()) {
            $services = Service::updateService($request, $id);

            if ($services) {
                return redirect()
                    ->route('service.index')
                    ->withToastSuccess("Berhasil mengupdate data!");
            }

            return redirect()->back()
                ->withToasError("Gagal mengupdate data!");
        } else {
            return redirect()->back()
                ->withErrors($validation)
                ->withInput()
                ->withToastError('Periksa kembali input!');
        }
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
        $services = Service::findOrFail($request->id);

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
        $services = Service::getAllServicesForDatatable();

        return $services;
    }

    public function getAllServices()
    {
        $services = Service::getAllServices();

        return $services;
    }
}

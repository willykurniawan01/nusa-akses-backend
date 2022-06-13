<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Page;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view("pages.pages.indexPages", compact("pages"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.pages.createPages");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), Page::$rules, Pagae::$messages);

        if (!$validation->fails()) {
            $path = $request->file("picture")->store("pages", "public");

            $page = new Page;
            $page->name = $request->name;
            $page->content = $request->content;
            $page->picture = $path;

            if ($page->save()) {
                return redirect()->route("pages.index")->withToastSuccess("Berhasil menambahkan halaman!");
            }
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
    public function edit(Page $page)
    {
        return view("pages.pages.editPages", compact("pages"));
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
    public function destroy(Page $page)
    {
        if ($page->delete()) {
            return redirect()->route("pages.index")->withToastSuccess("Berhasil menghapus halaman!");
        }

        return redirect()->route("pages.index")->withToastSuccess("Gagal menghapus halaman!");
    }
}

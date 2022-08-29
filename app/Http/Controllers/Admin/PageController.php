<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\PageComponent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view("pages.admin.page.index", compact("pages"));
    }

    public function home()
    {
        return view("pages.admin.page.home");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.page.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), Page::$rules, Page::$messages);

        if (!$validation->fails()) {
            $path = $request->file("picture")->store("pages", "public");

            $page = new Page;
            $page->name = $request->name;
            $page->content = $request->content;
            $page->picture = $path;

            if ($page->save()) {
                return redirect()->route("page.index")->withToastSuccess("Berhasil menambahkan halaman!");
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
        return view("pages.admin.page.edit", compact("page"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {

        $page->name = $request->name;
        $page->content = $request->content;

        if ($request->hasFile("picture")) {
            $path = $request->file("picture")->store("pages", "public");
            $page->picture = $path;
        }

        if ($page->save()) {
            return redirect()->route("page.index")->withToastSuccess("Berhasil mengupdate halaman!");
        }
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
            return redirect()->route("page.index")->withToastSuccess("Berhasil menghapus halaman!");
        }

        return redirect()->route("page.index")->withToastSuccess("Gagal menghapus halaman!");
    }
}

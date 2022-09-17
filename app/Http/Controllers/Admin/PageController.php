<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\PageComponent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{

    public function index()
    {
        $pages = Page::all();
        return view("pages.admin.page.index", compact("pages"));
    }

    public function home()
    {
        return view("pages.admin.page.home");
    }

    public function create()
    {
        return view("pages.admin.page.create");
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), Page::$rules, Page::$messages);

        if (!$validation->fails()) {

            $page = new Page;
            $page->name = $request->name;
            $page->content = $request->content;

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


    public function edit(Page $page)
    {
        return view("pages.admin.page.edit", compact("page"));
    }

    public function update(Request $request, Page $page)
    {

        $page->name = $request->name;
        $page->content = $request->content;

        if ($page->save()) {
            return redirect()->route("page.index")->withToastSuccess("Berhasil mengupdate halaman!");
        }
    }


    public function destroy(Page $page)
    {
        if ($page->delete()) {
            return redirect()->route("page.index")->withToastSuccess("Berhasil menghapus halaman!");
        }

        return redirect()->route("page.index")->withToastSuccess("Gagal menghapus halaman!");
    }
}

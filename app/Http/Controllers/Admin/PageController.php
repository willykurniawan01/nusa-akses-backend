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
        return view("pages.admin.pages.indexPages", compact("pages"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.pages.createPages");
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
            $page = new Page;
            $page->name = $request->name;
            $page->save();

            foreach ($request->page_components as $eachComponent) {
                $detail = [];
                switch ($eachComponent["type"]) {
                    case "navbar":
                        $detail["type"] = $eachComponent["type"];
                        break;

                    case "imageSlider":
                        $detail["type"] = $eachComponent["type"];

                        break;
                }

                $pageComponent = new PageComponent;
                $pageComponent->page_id = $page->id;
                $pageComponent->detail = json_encode($detail);
                $pageComponent->save();
            }


            return redirect()->route("pages.index")->withToastSuccess("Berhasil menambahkan halaman!");
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
        return view("pages.admin.pages.editPages", compact("pages"));
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
        PageComponent::where("page_id", $page->id)->delete();
        if ($page->delete()) {
            return redirect()->route("pages.index")->withToastSuccess("Berhasil menghapus halaman!");
        }

        return redirect()->route("pages.index")->withToastSuccess("Gagal menghapus halaman!");
    }
}

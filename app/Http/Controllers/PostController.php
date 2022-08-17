<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.post.indexPost');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.post.createPost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $validation = Validator::make($request->all(), PostRequest::addPost(), PostRequest::addPostMessages());


            if (!$validation->fails()) {
                $savePost = Post::savePost($request);
                if ($savePost) {
                    return redirect()->route('post.index')->withToastSuccess('Berhasil menambahkan berita!');
                }
            } else {
                return redirect()->back()
                    ->withErrors($validation)
                    ->withInput()
                    ->withToastError('Periksa kembali input!');
            }
        } catch (Exception $e) {
            // return redirect()->back()->withToastError("Something Wrong!");
            throw $e;
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
        $post =  Post::find($id);
        return view('pages.post.DetailPost', compact('post'));
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
        $post  =  Post::updatePost($request, $id);

        if ($post) {
            return redirect()->route('post.index')->withToastSuccess("Berhasil mengupdate berita!");
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
        // dd($request->all());
        $result = [];
        $post = Post::findOrFail($request->id);

        if ($post->delete()) {
            $result["message"] = "Berhasil menghapus data!";
            return response()->json($result, "200");
        } else {
            $result["message"] = "Gagal menghapus data!";
            return response()->json($result, "404");
        }
    }


    public function getAllPostForDataTable()
    {
        $post = Post::getAllPostForDatatable();

        return $post;
    }
}

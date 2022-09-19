<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\ImageSlider;
use App\Models\Page;
use App\Models\Post;
use App\Models\Report;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $imageSliders = ImageSlider::all();
        $services = Service::with("page")->get();
        return view("pages.guest.index", compact("imageSliders", "services"));
    }

    public function berita()
    {
        $berita = Post::paginate(6);
        return view("pages.guest.berita", compact("berita"));
    }


    public function page($id)
    {
        $page = Page::find($id);
        return view("pages.guest.page", compact("page"));
    }

    public function perusahaan()
    {
        return view("pages.guest.profilePerusahaan");
    }

    public function report(Request $request)
    {

        $rules  = [
            "date" => "required",
            "customer_name" => "required",
            "problem" => "required",
            "address" => "required",
        ];

        $messages  =  [
            "date.required" => "Tanggal tidak boleh kosong!",
            "customer_name.required" => "Nama tidak boleh kosong!",
            "problem.required" => "Problem tidak boleh kosong!",
            "address.required" => "Alamat tidak boleh kosong!",
        ];

        $validation = Validator::make($request->all(), $rules, $messages);

        if (!$validation->fails()) {
            $report = new Report();
            $report->date = $request->date;
            $report->customer_name = $request->customer_name;
            $report->problem = $request->problem;
            $report->description = $request->description;
            $report->address = $request->address;

            if ($report->save())
                return redirect()->back()->withToastSuccess("Berhasil mengirim laporan!");
        }

        return redirect()->back()->withToastError("Gagal mengirim laporan!");
    }
}

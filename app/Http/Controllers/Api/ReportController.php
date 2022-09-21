<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    public function send(Request $request)
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
                return response()->json(["data" => $report], 200);
        }

        return response()->json(["data" => $validation->errors()->first()], 403);
    }
}

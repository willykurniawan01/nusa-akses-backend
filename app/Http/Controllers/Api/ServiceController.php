<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = [];
        $result['data'] = [];
        $services = Service::getAllServices();

        if ($services) {
            foreach ($services as $eachServices) {
                $eachServices->picture = url(Storage::url($eachServices->picture));
                array_push($result['data'], $eachServices);
            }
            return response()->json($result, 200);
        }

        return response()->json('gagal mengambil data', 404);
    }
}

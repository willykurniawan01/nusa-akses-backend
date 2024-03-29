<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class Services extends Model
{
    use HasFactory;

    protected $table = 'services';

    public function getAllServicesForDatatable()
    {
        $query = self::all();
        return DataTables::of($query)->toJson();
    }

    public static function getAllServices()
    {
        $query = self::all();
        return $query;
    }


    public function saveService($request)
    {
        if (!$request->hasFile('picture')) {
            $services = new self;
            $services->name = $request['name'];
            $services->description = $request['description'];
            $services->page_id = $request['page_id'];

            if ($services->save()) {
                return true;
            }
        } else {
            $services = new self;
            $services->name = $request['name'];
            $services->description = $request['description'];
            $path = $request->file('picture')->store('/services', 'public');
            $services->page_id = $request['page_id'];


            $services->picture = $path;
            if ($services->save()) {
                return true;
            }
        }

        return false;
    }


    public function updateService($request, $id)
    {
        if (!$request->hasFile('picture')) {
            $services = self::findOrFail($id);
            $services->name = $request['name'];
            $services->description = $request['description'];
            $services->page_id = $request['page_id'];

            if ($services->save()) {
                return true;
            }
        } else {
            $services = self::findOrFail($id);
            $services->name = $request['name'];
            $services->description = $request['description'];
            $path = $request->file('picture')->store('/services', 'public');
            $services->page_id = $request['page_id'];


            $services->picture = $path;
            if ($services->save()) {
                return true;
            }
        }

        return false;
    }
}

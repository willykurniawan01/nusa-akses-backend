<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class Services extends Model
{
    use HasFactory;

    protected $table = 'services';

    public function getAllServicesForDatatable()
    {
        $query = self::all();
        return DataTables::of($query)->toJson();
    }

    public function saveServices($data)
    {

        $services = new self;
        $services->name = $data['name'];
        $services->description = $data['description'];

        if ($services->save()) {
            return true;
        }

        return false;
    }
}

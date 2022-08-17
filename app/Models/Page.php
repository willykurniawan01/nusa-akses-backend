<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $table = "pages";

    public static $rules = [
        'name' => 'required',
    ];

    public static $messages = [
        'name.required' => 'nama hakaman tidak boleh kosong !',
    ];
}

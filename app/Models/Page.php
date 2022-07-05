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
        'content' => 'required'
    ];

    public static $messages = [
        'name.required' => 'nama hakaman tidak boleh kosong !',
        'content.required' => 'content hakaman tidak boleh kosong !',
    ];

    public function services(){
        return $this->hasMany(Page::class);
    }
}

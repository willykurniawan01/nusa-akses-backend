<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }


    public function messages()
    {
        return [
            //
        ];
    }


    public function addPost()
    {
        return [
            'judul' => 'required',
            'slug' => 'required|unique:posts',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required'
        ];
    }

    public function addPostMessages()
    {
        return [
            'judul.required' => 'judul tidak boleh kosong!',
            'slug.required' => 'slug tidak boleh kosong!',
            'picture.image' => 'file harus berupa gambar!',
            'picture.mimes' => 'ekstensi file tidak di support!',
            'picture.max' => 'ukuran gambar tidak boleh lebih dari 2mb!',
            'content.required' => 'isi berita tidak boleh kosong!'
        ];
    }
}

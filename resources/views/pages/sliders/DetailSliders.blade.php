@extends('layouts.app')

@section('title')

@section('content')
    <div class="container-fluid">

        <div class="row mb-3">
            <div class="col">
                <a href="{{ route('post.index') }}" class="btn btn-primary">
                    <i class="uil-arrow-left"></i>
                </a>
            </div>

        </div>

        <!-- DataTales Example -->
        <form method="POST" name="formUpdate" action="{{ route('post.update', $post->id) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Postingan</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="judul">Judul :</label>
                                <input disabled name="judul" id="judul" type="text" value="{{ $post->judul }}"
                                    class="form-control @error('judul') is-invalid @enderror">

                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div iv>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="slug">Slug :</label>
                                <input disabled name="slug" id="slug" type="text" value="{{ $post->slug }}"
                                    class="  form-control @error('slug') is-invalid @enderror">
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="picture">Picture :</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input disabled type="file" name="picture"
                                            class="custom-file-input  @error('picture') is-invalid @enderror" id="picture">
                                        <label class="custom-file-label" for="picture">Choose file</label>
                                    </div>
                                </div>
                                @error('picture')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <textarea readonly name="content" id="editor">{{ $post->content }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-end mt-3">
                            <button name="editButton" class="btn btn-success mr-2">
                                Edit
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- /.container-fluid -->

@endsection

@push('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>




    <script>
        $(function() {

            //variabel selector
            let editButton = $("button[name='editButton']")
            let formUpdate = $("form[name='formUpdate']")
            let ckEditor = '';
            let inputIsDisabled = true;


            //inisialisasi ckeditor
            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    editor.isReadOnly = inputIsDisabled;
                    ckEditor = editor
                })
                .catch(error => {
                    console.error(error);
                });


            //event tombol edit di tekan
            editButton.on("click", function(event) {
                // set event ke default aga tidak refresh halaman
                event.preventDefault();

                if (!inputIsDisabled) {
                    let allInputInForm = formUpdate.find('input');
                    allInputInForm.prop('disabled', true);
                    ckEditor.isReadOnly = true;
                    inputIsDisabled = true;
                } else {
                    let allInputInForm = formUpdate.find('input');
                    allInputInForm.removeAttr('disabled');
                    ckEditor.isReadOnly = false;
                    inputIsDisabled = false;
                }

            });
        });
    </script>
@endpush

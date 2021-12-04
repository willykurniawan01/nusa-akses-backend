@extends('layouts.app')

@section('title')

@section('content')
    <div class="container-fluid">

        <div class="row mb-3">
            <div class="col">
                <a href="{{ route('post.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>

        </div>

        <!-- DataTales Example -->
        <form method="POST" action="{{ route('post.store') }}">
            @csrf
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Postingan</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="judul">Judul :</label>
                                <input name="judul" id="judul" type="text" class="form-control">
                            </div>
                        </div iv>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="slug">Slug :</label>
                                <input name="slug" id="slug" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="picture">Picture :</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="picture" class="custom-file-input" id="picture">
                                        <label class="custom-file-label" for="picture">Choose file</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <textarea name="content" id="editor"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-end mt-3">
                            <button class="btn btn-primary">
                                Submit
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
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        $(function() {

        });
    </script>
@endpush

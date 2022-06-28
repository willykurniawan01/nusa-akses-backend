@extends('layouts.app')

@section('title')

@section('content')
    <div class="container-fluid">

        <div class="row mb-3">
            <div class="col">
                <a href="{{ URL::previous() }}" class="btn btn-primary">
                    <i class="uil-arrow-left"></i>
                </a>
            </div>

        </div>

        <!-- DataTales Example -->
        <form method="POST" action="{{ route('pages.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Halaman</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Nama Halaman :</label>
                                <input name="name" id="name" type="text" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror">

                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Isi Halaman :</label>
                                <textarea name="content" id="editor">{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-primary">
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

@push('style')
@endpush

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

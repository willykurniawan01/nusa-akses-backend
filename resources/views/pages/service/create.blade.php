@extends('layouts.app')

@section('title','Layanan')

@section('content')
    <div class="container-fluid">

        <div class="row mt-3 mb-3">
            <div class="col">
                <a href="{{ route("service.index") }}" class="btn btn-success">
                    <i class="uil-arrow-left"></i>
                </a>
            </div>
        </div>

        <!-- DataTales Example -->
        <form method="POST" action="{{ route('service.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-uppercase">Layanan</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Nama :</label>
                                <input name="name" id="name" type="text" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror">

                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div iv>
                 
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="picture">Gambar :</label>
                                <div class="mb-3">
                                    <input class="form-control" name="picture" type="file">
                                  </div>
                                @error('picture')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="page">Halaman :</label>
                                <div class="input-group mb-3">
                                    <select class="form-select"  name="page_id" >
                                      <option value="" selected>Pilih halaman...</option>
                                      @foreach ($page as $eachPage)
                                        <option value="{{ $eachPage->id }}">{{ $eachPage->name }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                @error('page')
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
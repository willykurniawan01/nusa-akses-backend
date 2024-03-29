@extends('layouts.app')

@section('title')

@section('content')
    <div class="container-fluid">

        <div class="row mb-3">
            <div class="col">
                <a href="{{ URL::previous() }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>

        </div>

        <!-- DataTales Example -->
        <form method="POST" action="{{ route('services.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Layanan</h6>
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
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="picture"
                                            class="custom-file-input  @error('picture') is-invalid @enderror" id="picture">
                                        <label class="custom-file-label" for="picture">Choose file</label>
                                    </div>
                                </div>
                                @error('picture')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="picture">Halaman :</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="page_id" id="inputGroupSelect01">
                                      <option selected>Choose...</option>
                                      @foreach ($page as $eachPage)
                                        <option value="{{ $eachPage->id }}">{{ $eachPage->name }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                @error('picture')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <textarea name="description" id="editor">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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

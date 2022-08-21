@extends('layouts.app')

@section('title',"Halaman")

@section('content')
    <div class="container-fluid">

        <div class="row mb-3 mt-3">
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
                    <h4 class="m-0 font-weight-bold text-primary">Halaman</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label class="mb-1" for="name">Nama Halaman :</label>
                                <input name="name" id="name" type="text" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror">

                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 mb-2">
                        <div class="col-3">
                            <button type="button" class="btn btn-link">
                                <i class="mdi mdi-plus-circle me-2"></i> Tambah Komponen
                            </button>
                        </div>
                    </div>
                    <div class="component">
                        <div class="row">
                            <div class="card border-success border">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="mb-1">
                                                    Type
                                                </label>
                                                <select name="page_components[0][type]" class="form-select">
                                                    <option selected>Pilih Komponen</option>
                                                    <option value="navbar">Navbar</option>
                                                    <option value="imageSlider">Image Slider</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            
                                        </div>
                                    </div>
                                    <div class="row row-detail mt-3">
                                        
                                    </div> 
                                </div>
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

        $(function() {
            $(".component").children().each(function(index,value){
                $(`select[name*='[${index}][type]']`).on("change",function(){
                   let content = "";
                   switch($(this).val()){
                        case "navbar":
                            content = `
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="mb-1">
                                            Logo
                                        </label>
                                        <input type="file" name="page_components[${index}][logo]" class="form-control" />
                                    </div>
                                </div>
                            `;
                            $(".row-detail").html(content);
                            break;
                        case "imageSlider":
                             content = `
                                <div class="col-3">
                                    imageSlider
                                </div>
                            `;
                            $(".row-detail").html(content);
                            break; 
                        
                        default:
                            $(".row-detail").html("");
                            break;
                   }
                });
            });
        });
    </script>
@endpush

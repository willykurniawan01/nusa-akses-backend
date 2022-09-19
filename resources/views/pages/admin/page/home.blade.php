@extends('layouts.app')

@section('title',"Halaman")

@section('content')
    <div class="container-fluid">

        <div class="row mb-3 mt-3">
            <div class="col">
                <a href="{{ URL::previous() }}" class="btn btn-success">
                    <i class="uil-arrow-left"></i>
                </a>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-uppercase">Halaman Home</h4>
            </div>
            <div class="card-body">
                <div class="row">
                   <div class="col-sm-6">
                        <div class="card border-success border">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <i class="uil-scenery large-icon"></i>
                                    </div> 
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <h4>
                                                Image Slider
                                            </h4>
                                            <p>
                                                Kelola image slider pada halaman home
                                            </p>
                                            <a href="{{ route("slider.index") }}" class="btn btn-sm btn-success">
                                                Kelola
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div> 
                   <div class="col-sm-6">
                        <div class="card border-success border">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <i class="bi bi-gear large-icon"></i>
                                    </div> 
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <h4>
                                                Layanan
                                            </h4>
                                            <p>
                                                Kelola layanan pada halaman home
                                            </p>
                                            <a href="{{ route("service.index") }}" class="btn btn-sm btn-success">
                                                Kelola
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

@endsection

@push('style')
    <style>
        .large-icon{
            font-size: 60px;
        }
    </style>
@endpush


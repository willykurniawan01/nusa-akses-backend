@extends('layouts.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-2">
                                <i class="fas fa-2x fa-users-cog"></i>
                            </div>
                            <div class="col">
                                <div class="font-weight-bold text-primary text-uppercase mb-1">
                                    Pengaturan Akun
                                </div>
                                <div class=" mb-0 text-sm text-gray-600 mb-3">Pengaturan akun user </div>
                                <a href="{{ route("settings.index") }}" class="btn btn-sm btn-primary">
                                    Atur
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
             <div class="col-sm-6">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-2">
                                <i class="fas fa-2x fa-building"></i>
                            </div>
                            <div class="col">
                                <div class="font-weight-bold text-primary text-uppercase mb-1">
                                    Pengaturan Perusahaan
                                </div>
                                <div class=" mb-0 text-sm text-gray-600 mb-3">Pengaturan informasi tentang perusahaan </div>
                                <a href="{{ route('settings.company-setting') }}" class="btn btn-sm btn-primary">
                                    Atur
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.guest')

@section('title',"Home")

@section('content')
<nav aria-label="breadcrumb">
  <div class="container mt-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route("guest.home") }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Berita</li>
    </ol>
  </div>
</nav>
  <div class="articles mt-3">
    <div class="container">
      <div class="row">
        <div class="col-5">
          <div class="form-group d-flex">
            <input
              type="text"
              placeholder="ketik keyword..."
              class="form-control me-2"
            />
            <button class="btn-custom-primary">
              Cari
            </button>
          </div>
        </div>
      </div>
      <div class="row mt-5 mb-5">
        @foreach ($berita as $eachBerita)
          <div class="col-12 col-sm-4">
            <div class="card shadow-sm">
              <img src="{{ Storage::url($eachBerita->picture) }}" class="card-img"/>
              <div class="card-body">
                  <div class="card-title mt-3">
                    <a href="{{ route("guest.detail-berita",$eachBerita->id) }}">{{ $eachBerita->judul }}</a>
                  </div>
                  <a href="{{ route("guest.detail-berita",$eachBerita->id) }}"
                  class="btn btn-primary btn-lg mt-2 mb-3"
                  >
                    <i class="bi bi-arrow-right"></i>
                  </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection

@push('style')
    <style>
  
    </style>
@endpush
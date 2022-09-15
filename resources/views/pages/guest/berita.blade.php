@extends('layouts.guest')

@section('title',"Home")

@section('content')

  <div class="articles mt-5">
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
        <div class="col-12 col-sm-4">
            <div class="card shadow-sm">
            <div class="card-img" variant="top"/>
            <div class="card-body">
                <div class="card-title mt-3">
                <a></a>
                </div>
                <a
                class="btn btn-primary btn-lg mt-2 mb-3"

                >
                <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('style')
    <style>
  
    </style>
@endpush
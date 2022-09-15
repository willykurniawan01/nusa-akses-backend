@extends('layouts.guest')
@section('title',"Home")
@section('content')
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    @foreach ($imageSliders as $eachSlider)
    <div class="carousel-item active">
      <img src="{{ Storage::url($eachSlider->picture) }}" class="d-block w-100" alt="...">
    </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="layanan mt-5">
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <span class="layanan-title">Layanan yang tersedia.</span>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col">
        <div class="layanan-items">
          @foreach ($services as $eachService)
            <a href="#" class="layanan-button">
              <img
                src="{{  Storage::url($eachService->picture) }}"
                width="80"
                height="80"
              />
              <span>{{ $eachService->name }}</span>
            </a>
          @endforeach
        </div>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-12 col-sm-5">
        <img  class="img-fluid" alt="" />
      </div>
      <div class="col-12 col-sm-7">
        <div class="row">
          <h4 class="subTitle"></h4>
        </div>
        <div class="row">
          <h4 class="title"></h4>
        </div>
        <div class="row">
          <div
            class="content"
          ></div>
          <a
            class="btn btn-custom-primary w-50"
          >
            Selengkapnya
          </a>
        </div>
      </div>
    </div>

    <div class="row justify-content-center mt-5  mb-5">
      <div class="col-4 mt-5">
        <h4 class="text-center title">
          Bussiness Partner
        </h4>
        <img class="img-fluid mt-5" />
      </div>
    </div>
  </div>
</div>
@endsection

@push('style')
    <style>
      .subTitle {
        font-family: "Ubuntu";
        font-size: 1.2rem;
        font-weight: 300;
        color: #4e5764;
      }

      .title {
        font-family: "Ubuntu";
        font-size: 1.5rem;
        font-weight: 600;
        color: #061e38;
      }

      .content {
        font-family: "Poppins";
        color: #4e5764;
        font-weight: 300;
        font-size: 1.2rem;
      }

    </style>
@endpush
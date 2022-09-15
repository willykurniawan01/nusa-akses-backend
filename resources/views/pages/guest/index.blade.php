@extends('layouts.guest')
@section('title',"Home")
@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
      @foreach ($imageSlider as $eachSlider)
          <div class="carousel-item active px-5 py-4">
              <img src="{{ Storage::url($eachSlider->picture) }}" class="d-block w-100" alt="...">
          </div>
      @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="container">
  <div class="row mt-5">
    <div class="col d-flex justify-content-center">
      <h2 class="header">Layanan yang tersedia.</h2>
    </div>
  </div>
  <div class="row justify-content-center py-5">
    @foreach ($service as $eachService)
      <div class="col-sm-3">
        <a href="{{ route("guest.page",$eachService->page->id) }}" class="service d-flex flex-column align-items-center">
          <img src="{{ Storage::url($eachService->picture) }}" class="service-image">
          <span class="service-name">{{ $eachService->name }}</span>
        </a>
      </div>
    @endforeach
  </div>
  <div class="row mt-5 article py-5">
    <div class="col-sm-4">
      <img class="article-image" src="{{ asset("images/office.png") }}">
    </div>
    <div class="col-sm-8">
      <h4 class="title">
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo, dolor.
      </h4>
      <p class="mt-3">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae ratione itaque molestiae maiores obcaecati libero voluptas repellat aspernatur sequi dolores perferendis esse officia quidem at dolor, magnam maxime quae, quas blanditiis voluptates. Ratione vero quidem atque fuga dolores suscipit nulla minima modi ex reprehenderit rem, mollitia deleniti illo culpa voluptates.
      </p>
      <button class="btn-custom-primary mt-3">
        Selengkapnya
      </button>
    </div>
  </div>

  <div class="row mt-5 article py-5">
    <div class="col-sm-8">
      <h4 class="title">
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo, dolor.
      </h4>
      <p class="mt-3">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae ratione itaque molestiae maiores obcaecati libero voluptas repellat aspernatur sequi dolores perferendis esse officia quidem at dolor, magnam maxime quae, quas blanditiis voluptates. Ratione vero quidem atque fuga dolores suscipit nulla minima modi ex reprehenderit rem, mollitia deleniti illo culpa voluptates.
      </p>
      <button class="btn-custom-primary mt-3">
        Selengkapnya
      </button>
    </div>
    <div class="col-sm-4">
      <img class="article-image" src="{{ asset("images/office.png") }}">
    </div>
   
  </div>
  <div class="row">
    <div class="col">

    </div>
  </div>
  <div class="row justify-content-center text-center py-5 header">
    <h3>
      Bussiness Partner
    </h3>
    <img class="mt-5" src="{{ asset("images/partner.png") }}" style="width: 450px;">
  </div>
</div>
@endsection
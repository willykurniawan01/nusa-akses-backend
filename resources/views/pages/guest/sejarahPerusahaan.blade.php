@extends('layouts.guest')
@section('title',"Sejarah Perusahaan")
@section('content')

<nav aria-label="breadcrumb">
  <div class="container mt-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route("guest.home") }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Sejarah Perusahaan</li>
    </ol>
  </div>
</nav>

<div class="page-name">
  <div class="container">
    <h1>Sejarah Perusahaan</h1>
  </div>
</div>

<div class="container py-5">
  <div class="row">
      <p class="page-content">
        Daya Akses Nusantara merupakan suatu organisasi yang bergerak dalam jasa Internet dan pengembangan Aplikasi. Daya Akses Nusantara memiliki kantor yang terletak di kota Batam (Jl. Brigjen Katamso Komplek Pertokoan Central Barelang Raya Blok B-1 NO 6 Tanjung Uncang, Batam, Indonesia). Daya Akses Nusantara baru didirikan pada tahun Desember 2019. Daya Akses Nusantara bergerak dengan dua orang pendiri yakni Bapak Yulvizon dan Sukristiyo. Organisasi ini bisa termasuk baru beroperasi dalam dunia IT di kota Batam.
      </p>
  </div>
</div>
@endsection

@push('style')
    <style>
      .page-content{
        font-family: "Poppins";
        font-weight: 300;
        font-size: 1.2rem;
        text-align: justify;
      }
    </style>
@endpush
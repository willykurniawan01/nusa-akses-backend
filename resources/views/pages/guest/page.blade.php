@extends('layouts.guest')
@section('title',"Page")
@section('content')

<nav aria-label="breadcrumb">
  <div class="container mt-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route("guest.home") }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $page->name }}</li>
    </ol>
  </div>
</nav>

<div class="page-name">
  <div class="container">
    <h1>{{ $page->name }}</h1>
  </div>
</div>

<div class="container py-5">
  <div class="row">
      <p class="page-content">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia molestias rem quae nobis, omnis veniam exercitationem libero magni nihil iste in sunt non dolorum, eligendi veritatis, nam quibusdam amet officia. Deleniti suscipit repellendus id rem vero a qui placeat natus dolores, similique consectetur distinctio cupiditate, dolor quibusdam fugiat! Ut eum consequatur expedita culpa iure delectus, amet earum distinctio illo. Dolorum, porro similique ab veniam aliquam nobis aut error, dolorem nisi consectetur ipsum corrupti perspiciatis ducimus, fugit molestias voluptas enim earum laudantium vero neque cum dolores. Voluptates natus maxime, amet ab adipisci sapiente sunt accusamus cumque numquam, animi officia inventore dolores voluptate distinctio fuga placeat delectus architecto? Veniam in officia debitis, quisquam totam voluptate expedita? Perferendis ex dolor error amet quod hic ducimus illo sint, modi accusamus cumque nihil, veniam vitae voluptates dolore? Eligendi quae minus, illum odio, repellendus, totam iste magnam debitis alias dolorem voluptas? 
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
@extends("layouts.guest")

@section('title',"Berita")
    
@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-sm-12">
        <div class="row">
          <div class="col">
            <img
              class="img-fluid"
              src="{{ Storage::url($berita->picture) }}"
            />
            <h4 class="postTitle">{{ $berita->judul }}</h4>
            <div class="postDate">
              <span>{{ date("d/m/Y",strtotime($berita->created_at)) }}</span>
            </div>
            <div
              class="postContent"
            >
            {!! $berita->content !!}
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('style')
    <style>
        .card {
          border-radius: 30px 30px 30px 0px;
          overflow: hidden;
        }
        .card .card-title a {
            font-size: 1.4rem;
            color: #061e38;
            text-decoration: none;
        }
        .card .card-title a:hover {
            color: #553df7;
            transition: 0.5s all;
        }
        .card .btn {
            border-radius: 50%;
        }
        .postTitle {
            font-family: "Poppins";
            font-size: 1.8rem;
            font-weight: 600;
            margin-top: 20px;
        }

        .postContent {
        font-family: "Poppins";
        text-align: justify;
        font-size: 1rem;
        }

        .postCardTitle {
        font-family: "Poppins";
        text-decoration: none;
        font-size: 1rem;
        color: #000;
        font-weight: 400;
        transition: 0.5s all;
        }

        .postCardTitle:hover {
        transition: 0.5s all;
        color: #553df7;
        }

        .postCardDate {
        font-family: "Poppins";
        text-decoration: none;
        font-size: 1rem;
        font-weight: 600;
        }

        .postDate {
        font-family: "Poppins";
        font-size: 1.4rem;
        margin-bottom: 15px;
        }

        .postDate span {
        margin-left: 10px;
        }
    </style>
@endpush
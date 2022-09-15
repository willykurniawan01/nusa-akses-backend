@extends("layouts.guest")

@section('title',"Berita")
    
@section('content')
<nav className="navigation mt-5">
    <div className="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="">Home</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          Berita
        </li>
      </ol>
    </div>
  </nav>
  <div className="container">
    <div className="row">
      <div className="col-sm-9">
        <div className="row">
          <div className="col">
            <img
              className="img-fluid"
              alt=""
            />
            <h4 className="postTitle"></h4>
            <div className="postDate">
              <i class="bi bi-calendar"></i>
              <span></span>
            </div>
            <div
              className="postContent"
            ></div>
          </div>
        </div>
      </div>
      <div className="col-sm-2 offset-sm-1">
        <div className="row">
          <div className="col">
            <img  className="img-fluid" alt="" />
            <div className="postCardDate">
              <span>20 September 2021</span>
            </div>
            <a className="postCardTitle" href="">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit.
              Magnam, aut!
            </a>
          </div>
        </div>
      </div> 
    </div>
  </div>
@endsection

@push('style')
    <style>
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
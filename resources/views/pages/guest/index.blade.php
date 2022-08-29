<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nusa Akses | Home</title>
    <!-- CSS only -->
    <link rel="icon" href="{{ asset("images/logo/logo-light.png") }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset("assets/guest/style.css") }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="{{ asset("images/logo/logo.png") }}" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item me-4">
                <a class="nav-link active" aria-current="page" href="#">Beranda</a>
              </li>
              <li class="nav-item me-4 dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Perusahaan
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>  
              <li class="nav-item me-4 dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Layanan
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item me-4">
                <a class="nav-link active" aria-current="page" href="#">Berita</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
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
        <div class="row justify-content-center mt-5">
          @foreach ($service as $eachService)
            <div class="col-sm-3">
              <a href="#" class="service d-flex flex-column align-items-center">
                <img src="{{ Storage::url($eachService->picture) }}" class="service-image">
                <span class="service-name">{{ $eachService->name }}</span>
              </a>
            </div>
          @endforeach
        </div>
        <div class="row mt-5">
          <div class="col-sm-4">
            <img src="" alt="">
          </div>
          <div class="col-sm-8">
            <h4 class="title">
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo, dolor.
            </h4>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae ratione itaque molestiae maiores obcaecati libero voluptas repellat aspernatur sequi dolores perferendis esse officia quidem at dolor, magnam maxime quae, quas blanditiis voluptates. Ratione vero quidem atque fuga dolores suscipit nulla minima modi ex reprehenderit rem, mollitia deleniti illo culpa voluptates.
            </p>
            <button class="btn-custom-primary">
              Selengkapnya
            </button>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-sm-8">
            <h4 class="title">
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo, dolor.
            </h4>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae ratione itaque molestiae maiores obcaecati libero voluptas repellat aspernatur sequi dolores perferendis esse officia quidem at dolor, magnam maxime quae, quas blanditiis voluptates. Ratione vero quidem atque fuga dolores suscipit nulla minima modi ex reprehenderit rem, mollitia deleniti illo culpa voluptates.
            </p>
            <button class="btn-custom-primary">
              Selengkapnya
            </button>
          </div>
          <div class="col-sm-4">
            <img src="" alt="">
          </div>
        </div>
        <div class="row">
          <div class="col">

          </div>
        </div>
        <div class="row justify-content-center text-center mt-5">
          <h3>
            Bussiness Partner
          </h3>
          <img src="{{ asset("images/partner.png") }}" style="width: 450px;">
        </div>
        <div class="footer">
          <div class="row">
            <div class="col"></div>
          </div>
        </div>
      </div>
      <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
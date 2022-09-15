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
    @stack('style')
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
        <a class="nav-link active" aria-current="page" href="{{ route("guest.home") }}">Beranda</a>
        </li>
        <li class="nav-item me-4 dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Perusahaan
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route("guest.perusahaan") }}">Profile</a></li>
        </ul>
        </li>  
        <li class="nav-item me-4 dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Layanan
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach (App\Models\Service::with("page")->get() as $eachService)
                <li><a class="dropdown-item mt-2" href="{{ route("guest.page",$eachService->page->id) }}">{{ $eachService->name }}</a></li>
            @endforeach
        </ul>
        </li>
        <li class="nav-item me-4">
        <a class="nav-link active" aria-current="page" href="{{ route("guest.berita") }}">Berita</a>
        </li>
    </ul>
    </div>
</div>
</nav>
@yield('content')

<div class="footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="footer-brand">
            <img class="footer-brand-logo"  />
            <span class="footer-brand-desc">
              Jl. Brigjen Katamso, Tj. Uncang, Kec. Batu Aji,
              <p>Kota Batam,Kepulauan Riau 29425</p>
              <p>E : sales@nusaakses.net.id</p>
              <p>T: 0821-7016-7025</p>
            </span>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="footer-nav">
            <p class="footer-nav-header">Bantuan</p>
            <a href="#" class="footer-nav-link">
              Pusat Bantuan
            </a>
            <a href="#" class="footer-nav-link">
              Hubungi Kami
            </a>
            <a href="#" class="footer-nav-link">
              Kendala
            </a>
          </div>
        </div> 
        <div class="col-sm-3">
          <div class="footer-nav">
            <p class="footer-nav-header">Layanan</p>
            <a class="footer-nav-link"></a>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="footer-nav">
            <p class="footer-nav-header">Perusahaan</p>
            <a href="#" class="footer-nav-link">
              Profil Perusahaan
            </a>
            <a href="#" class="footer-nav-link">
              Sejarah Perusahaan
            </a>
            <a href="#" class="footer-nav-link">
              Karir
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="footer-socialmedia">
            <p class="footer-socialmedia-header">Tetap terhubung dengan kami</p>
            <div class="footer-socialmedia-nav">
              <a href="" class="footer-socialmedia-nav-link">
                <i class="bi bi-instagram"></i>
              </a>
              <a href="" class="footer-socialmedia-nav-link">
                <i class="bi bi-facebook"></i>
              </a>
              <a href="" class="footer-socialmedia-nav-link">
                <i class="bi bi-twitter"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        <p class="footer-copyright-text">© PT Daya Akses Nusantara, 2021.</p>
      </div>
    </div>
  </div>


        
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
@stack('script')
</body>
</html>
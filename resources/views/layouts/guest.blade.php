<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nusa Akses | @yield('title')</title>
    <!-- CSS only -->
    <link rel="icon" href="{{ asset("images/logo/logo-light.png") }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset("assets/guest/style.css") }}">
    @stack('style')
</head>
<body>
   
<nav class="navbar navbar-expand-lg bg-white shadow-sm">
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
        <a class="nav-link" aria-current="page" href="{{ route("guest.home") }}">Beranda</a>
        </li>
        <li class="nav-item me-4 dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Perusahaan <i class="bi bi-chevron-down"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route("guest.perusahaan") }}">Profile Perusahaan</a></li>
            <li><a class="dropdown-item" href="{{ route("guest.perusahaan") }}">Sejarah Perusahaan</a></li>
        </ul>
        </li>  
        <li class="nav-item me-4 dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Layanan <i class="bi bi-chevron-down"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach (App\Models\Service::with("page")->get() as $eachService)
                <li><a class="dropdown-item mt-2" href="{{ !is_null($eachService->page) ? route("guest.page",$eachService->page->id) :'#' }} ">{{ $eachService->name }}</a></li>
            @endforeach
        </ul>
        </li>
        <li class="nav-item me-4">
        <a class="nav-link" aria-current="page" href="{{ route("guest.berita") }}">Berita</a>
        </li>   
        {{-- <li class="nav-item me-4">
          <a class="nav-link" aria-current="page" href="https://mrtg.nusaakses.net.id/">MRTG Nusa Akses
          </a>
        </li> --}}
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
              Laporan Kendala
            </a>
          </div>
        </div> 
        <div class="col-sm-3">
          <div class="footer-nav">
            <p class="footer-nav-header">Layanan</p>
            @foreach (App\Models\Service::with("page")->get() as $eachService)
              <a href="{{  !is_null($eachService->page) ? route("guest.page",$eachService->page->id)  :'#' }}" class="footer-nav-link">{{ $eachService->name }}</a>
            @endforeach
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
  
  <button id="chatButton" class="float-button shadow">
    <i class="bi bi-chat-fill"></i>
  </button>

  <!-- Modal -->
<div class="modal fade" id="chatModal" tabindex="-1" aria-labelledby="chatModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Admin</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-6"> 
            <div class="card shadow-sm">
              <div class="card-body">
                <p>
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit. A quos temporibus quas hic, repellat quaerat tempore, blanditiis, exercitationem in eaque soluta dolorem itaque quod doloribus ipsam dolore voluptas! Velit, iusto!
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-end">
          <div class="col-6"> 
            <div class="card shadow-sm self-message">
              <div class="card-body">
                <p>
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit. A quos temporibus quas hic, repellat quaerat tempore, blanditiis, exercitationem in eaque soluta dolorem itaque quod doloribus ipsam dolore voluptas! Velit, iusto!
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="input-group">
          <input type="text" placeholder="ketik pesan..." class="form-control">
          <button type="button" class="btn btn-primary">Kirim</button>
        </div>
      </div>
    </div>
  </div>
</div>

  <!-- Modal -->
<div class="modal fade" id="chatLoginModal" tabindex="-1" aria-labelledby="chatLoginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control mt-2" name="email">
            </div>
          </div>
          <div class="row mt-3">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control mt-2" name="name">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="loginButton" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>

        
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
@stack('script')

<script>
  $(function(){
    let chatModal = $('#chatModal');
    let chatLoginModal = $('#chatLoginModal');
    let chatButton = $('#chatButton');
    let loginButton = $('#loginButton');
    let emailInput = $("input[name='email']");
    let nameInput = $("input[name='name']");

    chatButton.on("click",function(){
      let email = sessionStorage.getItem("email");
      if(!email != ""){
        chatLoginModal.modal("show");
      }else{
        chatModal.modal("show");
      }
    });

    loginButton.on("click",function(){
      if(emailInput.val() != "" && nameInput != ""){
        sessionStorage.setItem("email",emailInput.val());
        sessionStorage.setItem("name",nameInput.val());
      }
    });
    
  });
</script>
</body>
</html>
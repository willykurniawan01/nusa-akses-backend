@extends("layouts.guest")

@section('title',"Perusahaan")
    
@section('content')
  <div class="profile">
    <div class="container">
      <div class="row">
        <div class="col"
        >
          <div
            data-aos="fade-right"
            class="profileContent align-self-center mt-5 lg-mt-0"
          >
            <div class="profileContentTitle">
              <h5>Tentang Nusa Akses</h5>
            </div>
            <div class="profileContentDesc">
              <p>Provides best-of-class fiber optic services and radio to Indonesia. No more buffering while watching your favorite movie at home, and no more performance delays accessing your business’s mission critical applications. Along with the best support team in the industry, we provide our customers with Internet access with speeds in excess of 1 Gbps+.</p>
            {{-- <button class="btn-transparent">
                Selengkapnya <i class="bi bi-arrow-right-circle"></i>
              </button>  --}}
            </div>
          </div>
        </div>
        <div
          class="col d-flex justify-content-center align-item-center"
        >
          <div class="profileImage" data-aos="fade-left">
            <img src="{{ asset("images/tower.png") }}" />
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="visiMisiContainer">
    <div class="visi">
      <div class="text" data-aos="fade-right">
        <div class="textTitle">
          <h5>Visi</h5>
        </div>
        <div class="textContent">
          <p>Menjadi penyedia layanan dan solusi gaya hidup digital mobile kelas dunia yang terpercaya.</p>
        </div>
      </div>
      <div class="text" data-aos="fade-right">
        <div class="textTitle">
          <h5>Misi</h5>
        </div>
        <div class="textContent">
          <p>Memberikan layanan dan solusi digital mobile yang melebihi ekspektasi para pengguna, menciptakan nilai lebih bagi para pemegang saham serta mendukung pertumbuhan ekonomi bangsa.
          </p>
        </div>
      </div>
    </div>
    <div class="misi">
      <div class="text" data-aos="fade-left">
        <div class="textTitle">
          <h5>Sejarah Perusahaan</h5>
        </div>
        <div class="textContent">
          <p>Daya Akses Nusantara merupakan suatu organisasi yang bergerak dalam jasa Internet dan pengembangan Aplikasi. Daya Akses Nusantara memiliki kantor yang terletak di kota Batam (Jl. Brigjen Katamso Komplek Pertokoan Central Barelang Raya Blok B-1 NO 6 Tanjung Uncang, Batam, Indonesia). Daya Akses Nusantara baru didirikan pada tahun Desember 2019. Daya Akses Nusantara bergerak dengan dua orang pendiri yakni Bapak Yulvizon dan Sukristiyo. Organisasi ini bisa termasuk baru beroperasi dalam dunia IT di kota Batam.</p>
        </div>
      </div>
        {{-- <button class="buttonTransparent">
        Selengkapnya <i class="bi bi-arrow-right-circle"></i>
      </button>  --}}
    </div>
  </div>

  <div class="row justify-content-center mt-5  mb-5">
    <div class="col-4 mt-5">
      <h4 class="text-center title">
        Bussiness Partner
      </h4>
      <img src="{{ asset("images/partner.png") }}" class="img-fluid mt-5" />
    </div>
  </div>

@endsection

@push('style')
    <style>
        .profile {
  background-color: #eff6ff;
  font-family: "Poppins";
  color: #fff;
  padding: 50px 0px;
}

.profileContent {
}

.profileContentDesc {
  color: #4e5764;
}

.profileContentTitle h5 {
  color: #061e38;
  font-weight: 600;
  font-size: 1.5rem;
}

.profileContentTitle::after {
  content: "";
  display: block;
  width: 100px;
  height: 4px;
  background-color: #553df7;
  border-radius: 5px;
  margin-bottom: 20px;
}

.profileImage img {
  border-radius: 0px 50px 50px 50px;
  box-shadow: -10px 10px #061e38;
}

.visi {
  background-color: #061e38;
  width: 50%;
  padding: 50px;
  color: #fff;
  font-family: "Poppins";
}

.misi {
  background-color: #553df7;
  width: 50%;
  padding: 50px;
  color: #fff;
  font-family: "Poppins";
}

.visiMisiContainer {
  display: flex;
  flex-wrap: wrap;
}

.textTitle {
  font-family: "Poppins";
}

.textContent {
  font-family: "Poppins";
  font-weight: 200;
  font-size: 1.2rem;
}

.buttonTransparent {
  color: #fff;
  background-color: transparent;
  border: none;
  font-size: 1.5rem;
  transition: all 0.5s;
}

.buttonTransparent:hover {
  transform: translateX(20px);
  transition: all 0.5s;
  color: #061e38;
}

.history {
  font-family: "Poppins";
}

@media only screen and (max-width: 600px) {
  .visi {
    background-color: #061e38;
    width: 100%;
    padding: 50px;
    color: #fff;
    font-family: "Poppins";
  }

  .misi {
    background-color: #553df7;
    width: 100%;
    padding: 50px;
    color: #fff;
    font-family: "Poppins";
  }
}

    </style>
@endpush
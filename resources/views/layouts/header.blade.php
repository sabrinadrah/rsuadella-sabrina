<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between position-relative">

      <div class="logo">
        <a href="/"><img src="{{ asset('assets/images/logo adella.png') }}" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar @if(request()->path() === '/') d-none @endif">
        <div class="dropdown"><a href="#"><i class="bi bi-list"></i></a>
            <ul>
              <li><a href="/reservasi">Reservasi</a></li>
              <li><a href="#">Klinik</a></li>
              <li><a href="#">Kapasitas</a></li>
              <li><a href="#">Farmasi</a></li>
              <li><a href="#">Official</a></li>
              <li><a href="#">Riwayat</a></li>
              <li><a href="/antrian">Cek Antrian</a></li>
            </ul>
        </div>
      </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
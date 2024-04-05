@extends('layout')
@section('main')

<main id="main">
    <section id="reservasi" class="reservasi">
        <div class="container vh-100">

          <!-- MODAL Reservasi -->
          <div class="modal fade modalReservasi" id="reservasiModal" tabindex="-1" role="dialog" aria-labelledby="reservasiModalTitle" aria-hidden="true" data-bs-backdrop="static">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-body">

                    <div class="icon">
                      <svg width="120" height="120" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <g filter="url(#filter0_d_221_113)">
                          <circle cx="60" cy="56" r="41" fill="#A3CFBB"/>
                          <circle cx="60" cy="56" r="40.5" stroke="#A3CFBB"/>
                          </g>
                          <path d="M73.4125 46.5875C74.1937 47.3687 74.1937 48.6375 73.4125 49.4187L57.4125 65.4187C56.6312 66.2 55.3625 66.2 54.5812 65.4187L46.5812 57.4187C45.8 56.6375 45.8 55.3687 46.5812 54.5875C47.3625 53.8062 48.6312 53.8062 49.4125 54.5875L56 61.1687L70.5875 46.5875C71.3687 45.8062 72.6375 45.8062 73.4187 46.5875H73.4125Z" fill="#0F5132"/>
                          <defs>
                          <filter id="filter0_d_221_113" x="0" y="0" width="120" height="120" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                          <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                          <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                          <feMorphology radius="5" operator="erode" in="SourceAlpha" result="effect1_dropShadow_221_113"/>
                          <feOffset dy="4"/>
                          <feGaussianBlur stdDeviation="12"/>
                          <feComposite in2="hardAlpha" operator="out"/>
                          <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                          <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_221_113"/>
                          <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_221_113" result="shape"/>
                          </filter>
                          </defs>
                      </svg>   
                      <div><strong>Reservasi Berhasil!</strong></div>
                    </div>

                    <div class="detail__reservasi">
                      <div>No Antrian<span>{{ $reservasi->id }}</span></div>
                      <div>Spesialis<span>{{ $reservasi->dokter->spesialis }}</span></div>
                      <div>Dokter<span>{{ $reservasi->dokter->nama }}, {{ $reservasi->dokter->gelar }}</span></div>
                      <div>Jam<span>{{ \Carbon\Carbon::parse($reservasi->start)->format('H:i') }} - {{ \Carbon\Carbon::parse($reservasi->end)->format('H:i') }}</span></div>
                    </div>

                    <div class="d-flex flex-column">
                      <a href="/" class="btn btn-reservasi">Selesai</a>
                      <a href="/antrian" class="btn btn-reservasi mb-3">Cek Antrian</a>
                    </div>

                  </div>
                </div>
              </div>
          </div>

        </div>
    </section>
</main>

@endsection

@push('script')
<script>
$(document).ready(function() {
    $('#reservasiModal').modal('show');
});
</script>
@endpush
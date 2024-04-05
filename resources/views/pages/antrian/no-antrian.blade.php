@extends('layout')
@section('main')

<main id="main">
    <section id="antrian" class="antrian">
        <div class="container">

            <div class="box" style="min-height: 500px">
                <div class="antrian__back">
                    <a href="/antrian"><i class="bi bi-arrow-left"></i>Antrian</a>
                </div>

                <div>
                    @if (!empty($antrian))
                    <div class="row mt-5">
                        
                        <div class="antrian__sebelum">
                            <h4>Nomor Antrian Sekarang</h4>
                            <div class="antrian__box">{{ str_pad($antrian - 2, 3, '0', STR_PAD_LEFT) }}</div>
                        </div>
                        <div class="antrian__sesudah">
                            <h4>Nomor Antrian Anda</h4>
                            <div class="antrian__box">{{ str_pad($antrian, 3, '0', STR_PAD_LEFT) }}</div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <div class="antrian__info d-flex align-items-center">
                            <i class="bi bi-info-circle-fill"></i>
                            <p>Silahkan datang 10 menit atau maksimal 2 nomor sebelum nomor Anda dan jangan lupa membawa berkas yang diperlukan</p>
                        </div>
                    </div>

                    @else
                    <div class="text-center mt-5">
                        <p>Tidak ada reservasi ditemukan.</p>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </section>
</main>

@endsection
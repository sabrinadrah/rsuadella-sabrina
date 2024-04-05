<main id="main">
    <section id="reservasi" class="reservasi">
        <div class="container">

            <!-- Progress bar -->
            <div class="progressbar_form">
                <div class="progress_form" id="progress_form"></div>

                <div class="progress-step progress-step-active" data-title="Cari Dokter atau Spesialis" ></div>
                <div class="progress-step" data-title="Pilih Jadwal"></div>
                <div class="progress-step" data-title="Pilih Jenis Pasien"></div>
                <div class="progress-step" data-title="Input Data"></div>
            </div>

            <div class="box" style="min-height: 350px">
                <div class="d-flex justify-content-center">

                    <div class="form-reservasi">

                        <div class="section-title">
                            <h2>Cari Dokter atau Spesialis</h2>
                            <p>Cari dokter atau spesialis dan jam yang kamu inginkan untuk berobat disini</p>
                        </div>
                        
                        <select wire:model.live="selectedDokter" class="pilih__dokter form-control">
                            <option value="">--- Pilih Dokter atau Spesialis ---</option>
                            <option value="Spesialis THT">THT</option>
                            <option value="Dokter Gigi">Gigi</option>
                            <option value="Spesialis Anak">Anak</option>
                            <option value="Spesialis Kandungan">Kandungan</option>
                            <option value="Spesialis Penyakit Dalam">Penyakit Dalam</option>
                        </select>

                        <h3>Pilih Dokter ({{ $jumlahDokter }})</h3>

                        <div class="row">
                            @if($selectedDokter)
                            @foreach($dokter as $item)
                            <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-4">
                                <div class="box__dokter_1">
                                    <div class="row">
                                        <div class="col-lg-4 d-flex justify-content-center align-items-start mb-2">
                                            <img src="{{url('assets/images/dokter')}}/{{ $item->foto }}" class="img-fluid">
                                        </div>
                                        <div class="profil__dokter col-lg-8 d-flex flex-column align-items-start">
                                            <div class="mb-2">{{ $item->nama }}, {{ $item->gelar }}</div>
                                            <div class="mb-2">
                                                <svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="16" cy="7" r="2" stroke="#0F5132"/>
                                                    <circle cx="16" cy="7" r="0.5" fill="#0F5132"/>
                                                    <circle cx="6" cy="10" r="1.5" fill="#0F5132"/>
                                                    <path d="M6 10C9.5935 10 10.7658 5.15754 10.9669 1.99813C11.002 1.44696 10.5523 1 10 1H9" stroke="#0F5132" stroke-linecap="round"/>
                                                    <path d="M6 10C2.4065 10 1.23423 5.15754 1.03308 1.99813C0.997991 1.44696 1.44772 1 2 1H3" stroke="#0F5132" stroke-linecap="round"/>
                                                    <path d="M16 9V11C16 13.7614 13.7614 16 11 16V16C8.23858 16 6 13.7614 6 11V10" stroke="#0F5132" stroke-linecap="round"/>
                                                </svg>
                                                {{ $item->spesialis }}
                                            </div>
                                            <div class="mb-1"><i class="bi bi-geo-alt"></i>   
                                                RS Adella Slawi
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <button type="button" class="btn border-0" data-bs-toggle="modal" data-bs-target="#profilModal-{{ $item->id }}"><i class="bi bi-info-circle"></i> Lihat Profil</button>
                                        <a href="{{route('reservasi.book', $item->id)}}" class="btn btn-jadwal btn-color">Pilih Jadwal</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                                <div class="col">Pilih untuk menampilkan daftar dokter.</div>
                            @endif
                        </div>

                        <!-- MODAL Profil Dokter -->
                        @foreach ($dokter as $item)
                        <div class="modal fade modalDokter" id="profilModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="profilModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="profilModalLongTitle" style="font-weight: 700">Profil Dokter</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-md-5 col-sm-12">
                                        <div class="box">
                                            <div class="text-center">
                                                <img src="{{url('assets/images/dokter')}}/{{ $item->foto }}" class="img-fluid mx-auto">
                                            </div>
                                            <div class="my-2 dokter__name"><strong>{{ $item->nama }}, {{ $item->gelar }}</strong></div>
                                            <div class="mb-2">
                                                <svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="16" cy="7" r="2" stroke="#0F5132"/>
                                                    <circle cx="16" cy="7" r="0.5" fill="#0F5132"/>
                                                    <circle cx="6" cy="10" r="1.5" fill="#0F5132"/>
                                                    <path d="M6 10C9.5935 10 10.7658 5.15754 10.9669 1.99813C11.002 1.44696 10.5523 1 10 1H9" stroke="#0F5132" stroke-linecap="round"/>
                                                    <path d="M6 10C2.4065 10 1.23423 5.15754 1.03308 1.99813C0.997991 1.44696 1.44772 1 2 1H3" stroke="#0F5132" stroke-linecap="round"/>
                                                    <path d="M16 9V11C16 13.7614 13.7614 16 11 16V16C8.23858 16 6 13.7614 6 11V10" stroke="#0F5132" stroke-linecap="round"/>
                                                </svg>
                                                {{ $item->spesialis }}
                                            </div>
                                            <div class="mb-1"><i class="bi bi-geo-alt"></i>   
                                                RS Adella Slawi
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6 mt-2">
                                                <div>
                                                    <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="56" height="56" rx="28" fill="#FFF8CD"/>
                                                        <path d="M32.8333 18.4057L35.424 17.5184C35.829 17.3788 35.8532 16.8153 35.4618 16.6413L28.1917 13.4168C28.0702 13.3517 27.9144 13.3713 27.8085 13.4168L20.5375 16.6413C20.1462 16.8157 20.171 17.3792 20.5762 17.5184L22.7643 18.2675L21.0221 19.0404C20.853 19.116 20.7438 19.2836 20.7429 19.4689V20.1709C20.2613 20.3618 19.9147 20.8318 19.9147 21.3769C19.9147 21.4682 19.9249 21.557 19.9432 21.6432L19.7157 24.5628C19.6701 25.1467 20.1434 25.66 20.7291 25.66H21.6974C22.2831 25.66 22.7563 25.1467 22.7108 24.5628L22.4833 21.6432C22.5016 21.557 22.5118 21.4681 22.5118 21.3769C22.5118 20.8331 22.167 20.3636 21.6872 20.1718V19.7747L23.1669 19.1197L23.1706 23.3273C23.1706 23.3273 23.3175 24.1829 24.0026 25.005C24.2675 25.3229 24.6205 25.6368 25.0695 25.9033L24.7719 27.5386L24.4236 27.2483C24.3441 27.1822 24.245 27.144 24.1417 27.1397C24.0105 27.134 23.883 27.1836 23.7898 27.276L22.335 28.7317C22.2569 28.8098 22.2086 28.9128 22.1987 29.0228L20.5099 29.7829C20.4403 29.8142 20.3791 29.8618 20.3321 29.9219L19.3334 31.1961C19.2721 31.2738 19.2364 31.369 19.232 31.4679L18.8036 42.134C18.7927 42.4013 19.0059 42.6243 19.2735 42.625H36.7231C36.992 42.6262 37.2076 42.4027 37.1966 42.134L36.7682 31.468C36.764 31.369 36.7282 31.2739 36.6669 31.1962L35.6673 29.922C35.6202 29.8619 35.56 29.8143 35.4904 29.7829L33.8016 29.0229C33.7917 28.9129 33.7434 28.8098 33.6653 28.7318L32.2096 27.276C32.1172 27.1846 31.9913 27.1351 31.8613 27.1397C31.7568 27.1439 31.6564 27.1808 31.5757 27.2475L31.2247 27.5396L30.9271 25.9052C31.3778 25.6383 31.7321 25.3238 31.9977 25.0051C32.6828 24.183 32.826 23.3274 32.826 23.3274L32.8333 18.4057ZM28.0001 14.3639L33.9785 17.0136L28.0001 19.0616L25.3495 18.1541L28.1918 16.8956C28.4305 16.7899 28.5378 16.5103 28.4313 16.2719C28.3567 16.102 28.1894 15.9917 28.0038 15.99C27.9365 15.9897 27.8699 16.0043 27.8085 16.0315L24.0367 17.7037L22.0208 17.0136L28.0001 14.3639ZM24.1104 18.7291L27.8463 20.0087C27.9457 20.0429 28.0537 20.0429 28.1531 20.0087L31.8899 18.7291V19.9636L28.0001 20.8268L24.1104 19.9636V18.7291ZM31.8899 20.9291V23.1845C31.8876 23.1972 31.7942 23.7748 31.2735 24.3997C30.7469 25.0317 29.821 25.684 28.0001 25.684C26.1793 25.684 25.2534 25.0317 24.7267 24.3997C24.206 23.7748 24.1126 23.1978 24.1104 23.1845V20.93L27.8951 21.7703C27.9628 21.7846 28.0329 21.7846 28.1006 21.7703L31.8899 20.9291ZM21.2129 21.0223C21.4141 21.0223 21.5685 21.1758 21.5685 21.377C21.5685 21.5782 21.4141 21.7326 21.2129 21.7326C21.0117 21.7326 20.8582 21.578 20.8582 21.377C20.8582 21.1758 21.0117 21.0223 21.2129 21.0223ZM20.8139 22.6051C20.9408 22.6472 21.0729 22.6761 21.2129 22.6761C21.3528 22.6761 21.4859 22.6472 21.6127 22.6051L21.7703 24.6365C21.774 24.6863 21.7474 24.7168 21.6975 24.7168H20.7292C20.6793 24.7168 20.6525 24.6863 20.6564 24.6365L20.8139 22.6051ZM27.2023 29.5637L25.6047 28.2324L25.9539 26.3087C26.525 26.505 27.2004 26.6284 28.0001 26.6284C28.7984 26.6284 29.4732 26.5061 30.0436 26.3106L30.3955 28.2315L28.7971 29.5637H27.2023ZM24.1518 28.2472L26.4404 30.1552L25.9069 31.2211L23.3623 29.0376L24.1518 28.2472ZM31.8475 28.2472L32.638 29.0376L30.0897 31.2211L29.5562 30.1589L31.8475 28.2472ZM22.7892 29.7903L24.1353 30.9447V41.6817H22.6547V35.3643C22.6538 35.105 22.4441 34.8953 22.1848 34.8944C21.9242 34.8934 21.7122 35.1037 21.7113 35.3643V39.7414H19.8456L20.169 31.6597L20.2436 31.5648L21.4671 32.8123L21.6975 33.9234C21.7505 34.1797 22.0017 34.3439 22.2576 34.2892C22.5123 34.236 22.676 33.9865 22.6234 33.7318L22.3627 32.4852C22.344 32.3972 22.3006 32.3162 22.2374 32.2521L20.8287 30.8149L21.001 30.5938L22.7892 29.7903ZM33.2101 29.7913L34.9956 30.5947L35.1698 30.8167L33.7629 32.2521C33.6997 32.3163 33.6563 32.397 33.6376 32.4852L33.376 33.7317C33.3234 33.9865 33.4871 34.236 33.7417 34.2891C33.9965 34.3417 34.246 34.1779 34.2991 33.9234L34.5322 32.8123L35.7566 31.5648L35.8313 31.6596L36.1547 39.7414H34.289V35.3642C34.2881 35.1036 34.0761 34.8933 33.8155 34.8944C33.5562 34.8953 33.3456 35.105 33.3447 35.3642V41.6817H31.8651V30.9447L33.2101 29.7913ZM28.6764 30.5071L29.3628 31.8808L28.7731 32.4713H27.2271L26.6347 31.8789L27.3221 30.5071L28.6764 30.5071ZM26.5417 33.1209L26.0746 39.2089C26.0639 39.3458 26.1132 39.4809 26.21 39.5783L27.6657 41.0303C27.8501 41.2155 28.1502 41.2155 28.3346 41.0303L29.7866 39.5783C29.8847 39.4815 29.9354 39.3464 29.9257 39.2089L29.4549 33.1227L30.9216 31.7536V41.6817H28.0001H25.0787V31.7536L26.5417 33.1209ZM28.5317 33.4148L28.9684 39.0624L28.0001 40.0307L27.0318 39.0624L27.4676 33.4148H28.5317ZM19.8079 40.6858H21.7113V41.6808H19.7682L19.8079 40.6858ZM34.289 40.6858H36.1924L36.232 41.6817H34.289L34.289 40.6858Z" fill="#936601"/>
                                                    </svg>
                                                </div>
                                                <div class="portfolio">Riwayat Pendidikan</div>
                                                <div>-</div>
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <div>
                                                    <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="56" height="56" rx="28" fill="#FFF8CD"/>
                                                        <path d="M40.5 25.5C40.5 27.0472 38.8334 28.5 36.5 28.5C34.1666 28.5 32.5 27.0472 32.5 25.5C32.5 23.9528 34.1666 22.5 36.5 22.5C38.8334 22.5 40.5 23.9528 40.5 25.5Z" stroke="#936601"/>
                                                        <ellipse cx="36.5" cy="26" rx="1.5" ry="1" fill="#936601"/>
                                                        <ellipse cx="22.5" cy="30.5" rx="1.5" ry="2.5" fill="#936601"/>
                                                        <path d="M23 29C27.4547 29 28.8087 21.5354 28.9805 16.9977C29.0014 16.4458 28.5523 16 28 16H26.6" stroke="#936601" stroke-linecap="round"/>
                                                        <path d="M23 29C17.0603 29 15.255 21.5352 15.026 16.9975C14.9982 16.4459 15.4477 16 16 16H18.2" stroke="#936601" stroke-linecap="round"/>
                                                        <path d="M37 29V32C37 35.866 33.866 39 30 39V39C26.134 39 23 35.866 23 32V30.4286" stroke="#936601" stroke-linecap="round"/>
                                                    </svg>                                                        
                                                </div>
                                                <div class="portfolio">Kondisi Klinis  yang Ditangani</div>
                                                <div>-</div>
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <div>
                                                    <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="56" height="56" rx="28" fill="#FFF8CD"/>
                                                        <path d="M26.8203 39.3072V32.5557L28.0997 32.7653L29.379 32.5557V39.3072H26.8203Z" stroke="#936601" stroke-miterlimit="10"/>
                                                        <path d="M19.3215 16.2468C19.3215 16.2468 14.9029 14.0375 14.919 18.3647C14.919 18.3647 14.876 22.1867 17.3702 25.3205C17.3702 25.3205 19.3161 28.0835 22.6865 29.1371C22.6865 29.1371 21.7512 27.6965 21.2835 26.5999C21.2835 26.5999 18.2195 24.8582 17.1175 21.2675C17.1175 21.2675 15.1716 16.3382 19.3161 18.0906V16.2468H19.3215Z" stroke="#936601" stroke-miterlimit="10" stroke-linejoin="round"/>
                                                        <path d="M28.0994 32.7654C30.3195 32.7654 32.1632 30.7604 32.1632 30.7604C34.4478 28.4543 35.6949 24.541 35.6949 24.541C37.3237 20.2783 36.727 13.688 36.727 13.688H28.0994H19.4664C19.4664 13.688 18.8751 20.2783 20.5039 24.541C20.5039 24.541 21.751 28.4597 24.0356 30.7604C24.0356 30.7604 25.8793 32.7654 28.0994 32.7654Z" stroke="#936601" stroke-miterlimit="10"/>
                                                        <path d="M36.9046 16.2468C36.9046 16.2468 41.3232 14.0375 41.3071 18.3647C41.3071 18.3647 41.3501 22.1867 38.8559 25.3205C38.8559 25.3205 36.91 28.0835 33.5396 29.1371C33.5396 29.1371 34.4749 27.6965 34.9425 26.5999C34.9425 26.5999 38.0065 24.8582 39.1085 21.2675C39.1085 21.2675 41.0544 16.3382 36.91 18.0906V16.2468H36.9046Z" stroke="#936601" stroke-miterlimit="10" stroke-linejoin="round"/>
                                                        <path d="M35.781 40.1353H20.4126V42.3714H35.781V40.1353Z" stroke="#936601" stroke-miterlimit="10"/>
                                                        <path d="M30.7338 39.3074H25.4658V40.1352H30.7338V39.3074Z" stroke="#936601" stroke-miterlimit="10"/>
                                                    </svg>                                                        
                                                </div>
                                                <div class="portfolio">Prestasi & Penghargaan</div>
                                                <div>-</div>
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <div>
                                                    <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="56" height="56" rx="28" fill="#FFF8CD"/>
                                                        <path d="M41.3332 34.3199V18.2266C41.3332 16.6266 40.0265 15.4399 38.4398 15.5733H38.3598C35.5598 15.8133 31.3065 17.2399 28.9332 18.7333L28.7065 18.8799C28.3198 19.1199 27.6798 19.1199 27.2932 18.8799L26.9598 18.6799C24.5865 17.1999 20.3465 15.7866 17.5465 15.5599C15.9598 15.4266 14.6665 16.6266 14.6665 18.2133V34.3199C14.6665 35.5999 15.7065 36.7999 16.9865 36.9599L17.3732 37.0133C20.2665 37.3999 24.7332 38.8666 27.2932 40.2666L27.3465 40.2933C27.7065 40.4933 28.2798 40.4933 28.6265 40.2933C31.1865 38.8799 35.6665 37.3999 38.5732 37.0133L39.0132 36.9599C40.2932 36.7999 41.3332 35.5999 41.3332 34.3199Z" stroke="#936601" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M28 19.3201V39.3201" stroke="#936601" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M22.3335 23.3201H19.3335" stroke="#936601" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M23.3335 27.3201H19.3335" stroke="#936601" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>                                                        
                                                </div>
                                                <div class="portfolio">Seminar/Course</div>
                                                <div>-</div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>
    </section>
</main>

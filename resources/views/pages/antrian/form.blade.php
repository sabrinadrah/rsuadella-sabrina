@extends('layout')
@section('main')

<main id="main">
    <section id="antrian" class="antrian">
        <div class="container">

            <div class="box h-500">
                <div class="section-title">
                    <h2>Cek Antrian</h2>
                    <p>Anda dapat melihat antrian yang sedang berjalan di RS Adella.</p>
                </div>

                <div class="d-flex justify-content-center">
                    <form action="{{ route('antrian.search') }}" method="POST" class="form-antrian">
                        @csrf
                        
                        <div class="form-group">
                            <label class="control-label required" for="name">Nama Lengkap Pasien</label>
                            <div>
                                <input id="nama" name="nama" type="text" class="form-control" placeholder="Isi dengan nama lengkap pasien..">
                                @error('nama')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label required" for="phone">No HP</label>
                            <div>
                                <input id="no_hp" name="no_hp" type="text" class="form-control" placeholder="Nomor yang dapat dihubungi..">
                                @error('no_hp')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-antrian btn-color w-100">Cek Antrian</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
</main>

@endsection
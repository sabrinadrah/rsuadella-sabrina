<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Reservasi;

use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function create($id){
        $dokter = Dokter::find($id);
        
        return view('pages.reservasi.form', compact('dokter'));
    }

    public function old(Request $request, $id) {
        $data = $request->all();
    
        // Periksa apakah pasien sudah ada dalam tabel pasien
        $pasien = Pasien::where('nik', $data['niks'])->first();
    
        // Jika pasien belum ada, buat pasien baru
        if (!$pasien) {
            error_log('Pasien tidak ditemukan');
        }

        $tanggal = Carbon::createFromFormat('d-m-Y H:i:s', $request->tanggal)->format('Y-m-d H:i:s');
    
        // Simpan reservasi dengan ID pasien
        $reservasi = Reservasi::create([
            'id_dokter' => $id,
            'id_pasien' => $pasien->id,
            'tanggal' => $tanggal,
            'start' => $data['start'],
            'end' => $data['end']
        ]);

        // Redirect ke halaman selesai dengan menyertakan ID reservasi yang baru saja dibuat
        return redirect()->route('reservasi.selesai', $reservasi->id);
    }

    public function store(Request $request, $id) {
        $data = $request->all();
    
        // Periksa apakah pasien sudah ada dalam tabel pasien
        $pasien = Pasien::where('nik', $data['nik'])->first();
    
        // Jika pasien belum ada, buat pasien baru
        if (!$pasien) {
            $pasien = Pasien::create([
                'nama' => $data['nama'],
                'nik' => $data['nik'],
                'ttl' => $data['ttl'],
                'ibu' => $data['ibu'],
                'alamat' => $data['alamat'],
                'no_hp' => $data['no_hp'],
                'no_bpjs' => $data['no_bpjs'],
                'gender' => $data['gender'],
                'goldar' => $data['goldar'],
                'agama' => $data['agama'],
                'status' => $data['status'],
                'pendidikan' => $data['pendidikan'],
                'pekerjaan' => $data['pekerjaan'],
                'penjamin' => $data['penjamin'],
            ]);
        }

        $tanggal = Carbon::createFromFormat('d-m-Y H:i:s', $request->tanggal)->format('Y-m-d H:i:s');
    
        // Simpan reservasi dengan ID pasien
        $reservasi = Reservasi::create([
            'id_dokter' => $id,
            'id_pasien' => $pasien->id,
            'tanggal' => $tanggal,
            'start' => $data['start'],
            'end' => $data['end']
        ]);

        // Redirect ke halaman selesai dengan menyertakan ID reservasi yang baru saja dibuat
        return redirect()->route('reservasi.selesai', $reservasi->id);
    }

    public function show($id)
    {
        $reservasi = Reservasi::find($id);
        
        return view('pages.reservasi.selesai', compact('reservasi'));
    }
} 
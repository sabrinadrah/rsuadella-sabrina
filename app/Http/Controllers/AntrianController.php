<?php

namespace App\Http\Controllers;

use App\Models\Pasien;

use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
        ]);

        $nama = $request->input('nama');
        $no_hp = $request->input('no_hp');

        $pasien = Pasien::where('nama', 'like', "%$nama%")
                        ->where('no_hp', $no_hp)
                        ->first();

        $antrian = $pasien ? optional($pasien->reservasi()->latest('created_at')->first())->id : null;

        return view('pages.antrian.no-antrian', compact('antrian'));
    }
}

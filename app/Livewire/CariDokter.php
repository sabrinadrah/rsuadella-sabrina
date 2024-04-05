<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Dokter;

class CariDokter extends Component
{
    public $dokter;
    public $selectedDokter = null;
    public $jumlahDokter = 0;

    public function mount($selectedDokter = null)
    {
        $this->dokter = Dokter::all();
        $this->selectedDokter = $selectedDokter;
    }

    public function render()
    {
        return view('livewire.cari-dokter');
    }

    public function updatedSelectedDokter($selectedDokter)
    {
        $this->selectedDokter = $selectedDokter;
        if (!empty($selectedDokter)) {
            $this->dokter = Dokter::where('spesialis', $selectedDokter)->get();
            $this->jumlahDokter = $this->dokter->count();
        } else {
            $this->dokter = Dokter::all();
            $this->jumlahDokter = 0;
        }
    }
}

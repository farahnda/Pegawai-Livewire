<?php

namespace App\Livewire\Absensi;

use Livewire\Component;
use App\Models\Pegawai;
use Carbon\Carbon;

class Index extends Component
{
    public $bulan, $tahun;
    public $dataRekap = [];

    public function mount()
    {
        $this->bulan = now()->month;
        $this->tahun = now()->year;
        $this->ambilRekap();
    }

    public function updated($property)
    {
        if (in_array($property, ['bulan', 'tahun'])) {
            $this->ambilRekap();
        }
    }

    public function ambilRekap()
    {
        $this->dataRekap = Pegawai::with(['absensis' => function ($query) {
            $query->whereMonth('tanggal', $this->bulan)
                  ->whereYear('tanggal', $this->tahun);
        }])->get();
    }

    public function render()
    {
        return view('livewire.absensi.index');
    }
}

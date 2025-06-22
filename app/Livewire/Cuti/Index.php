<?php

namespace App\Livewire\Cuti;

use Livewire\Component;
use App\Models\Cuti;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app', ['title' => 'Pengajuan Cuti'])]
class Index extends Component
{
    public $tanggal_mulai;
    public $tanggal_akhir;
    public $alasan;
    public $cutis;

    public function mount()
    {
        $this->loadCuti();
    }

    public function loadCuti()
    {
        $this->cutis = Cuti::where('pegawai_id', Auth::id())
            ->orderBy('tanggal_mulai', 'desc')
            ->get();
    }

    public function ajukanCuti()
    {
        $this->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string|max:255',
        ]);

        $durasi = Carbon::parse($this->tanggal_mulai)
                    ->diffInDays(Carbon::parse($this->tanggal_akhir)) + 1;

        // Total cuti tahun ini (berdasarkan tanggal_mulai)
        $totalCutiTahunIni = Cuti::where('pegawai_id', Auth::id())
            ->whereYear('tanggal_mulai', now()->year)
            ->get()
            ->sum(function ($cuti) {
                return Carbon::parse($cuti->tanggal_mulai)
                    ->diffInDays(Carbon::parse($cuti->tanggal_akhir)) + 1;
            });

        if ($totalCutiTahunIni + $durasi > 12) {
            $this->addError('tanggal_akhir', 'Maksimal total cuti dalam setahun adalah 12 hari.');
            return;
        }

        $pegawaiId = Auth::user()->pegawai->id; // Ambil id pegawai

Cuti::create([
    'pegawai_id' => $pegawaiId,
    'tanggal_mulai' => $this->tanggal_mulai,
    'tanggal_akhir' => $this->tanggal_akhir,
    'alasan' => $this->alasan,
]);


        session()->flash('success', 'Pengajuan cuti berhasil dikirim.');
        $this->reset(['tanggal_mulai', 'tanggal_akhir', 'alasan']);
        $this->loadCuti();
    }

    public function render()
    {
        return view('livewire.cuti.index');
    }
}

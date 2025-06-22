<?php

namespace App\Livewire\Absensi;

use Livewire\Component;
use App\Models\Pegawai;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app', ['title' => 'Absen Hari Ini'])]
class Create extends Component
{
    public $pegawai;
    public $status;

    public function mount()
    {
        $this->pegawai = Pegawai::where('user_id', Auth::id())->first();

        // Cegah error kalau belum punya data pegawai
        if (!$this->pegawai) {
            abort(403, 'Data pegawai tidak ditemukan.');
        }
    }

    public function simpan()
    {
        $this->validate([
            'status' => 'required|in:hadir,izin,alfa',
        ]);

        Absensi::create([
            'pegawai_id' => $this->pegawai->id,
            'tanggal' => Carbon::today(),
            'status' => $this->status,
        ]);

        session()->flash('success', 'Absen berhasil dicatat.');
        $this->reset('status');
    }

    public function render()
    {
        return view('livewire.absensi.create');
    }
}

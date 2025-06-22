<?php

namespace App\Livewire\Pegawai;

use Livewire\Component;
use App\Models\Pegawai;
use Livewire\Attributes\Layout; 

#[Layout('components.layouts.app', ['title' => 'Manajemen Pegawai'])]

class Index extends Component
{
    public $pegawais;
    public $selectedPegawai = null;

    public function mount()
    {
        // Ambil semua pegawai beserta relasinya
        $this->pegawais = Pegawai::with(['jabatan', 'unitKerja'])->latest()->get();
    }

    public function show($id)
    {
        $this->selectedPegawai = Pegawai::with(['jabatan', 'unitKerja'])->findOrFail($id);
    }


    public function render()
    {
        return view('livewire.pegawai.index', [
            'pegawais' => $this->pegawais,
        ]);
    }

    public function delete($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        session()->flash('success', 'Pegawai berhasil dihapus.');

        if ($this->selectedPegawai && $this->selectedPegawai->id == $id) {
            $this->selectedPegawai = null;
        }

        $this->pegawais = Pegawai::latest()->get(); 
    }
}

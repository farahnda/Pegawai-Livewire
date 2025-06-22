<?php

namespace App\Livewire\Pegawai;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\UnitKerja;
use Livewire\Attributes\Layout; 

#[Layout('components.layouts.app', ['title' => 'Menambah Pegawai'])]

class Create extends Component
{

    public $nip, $nama, $jabatan_id, $unit_kerja_id, $gaji;
    public $jabatans = [], $unitKerja = [];

    public function mount()
    {
        $this->jabatans = Jabatan::all();
        $this->unitKerja = UnitKerja::all();
    }

    public function store()
{
    $this->validate([
        'nip' => 'required|unique:pegawais,nip',
        'nama' => 'required|string|max:255',
        'jabatan_id' => 'required|exists:jabatans,id',
        'unit_kerja_id' => 'required|exists:unit_kerjas,id',
        'gaji' => 'required|numeric|min:0',
    ]);

    Pegawai::create([
        'nip' => $this->nip,
        'nama' => $this->nama,
        'jabatan_id' => $this->jabatan_id,
        'unit_kerja_id' => $this->unit_kerja_id,
        'gaji' => $this->gaji,
        'user_id' => Auth::id(), // 👈 Tambahkan ini
    ]);

    session()->flash('success', 'Data pegawai berhasil ditambahkan.');
    return redirect()->route('pegawai.index');
}


    public function render()
    {
        return view('livewire.pegawai.create');
    }
}

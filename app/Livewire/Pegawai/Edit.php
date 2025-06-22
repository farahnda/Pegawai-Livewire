<?php

namespace App\Livewire\Pegawai;

use Livewire\Component;
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\UnitKerja;
use Livewire\Attributes\Layout; 
use App\Models\User;

#[Layout('components.layouts.app', ['title' => 'Mengubah Pegawai'])]

class Edit extends Component
{
    public $pegawaiId;
    public $nip, $nama, $jabatan_id, $unit_kerja_id, $gaji;
    public $jabatans, $unitKerjas;

    public function mount($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $this->pegawaiId = $pegawai->id;
        $this->nip = $pegawai->nip;
        $this->nama = $pegawai->nama;
        
        $this->jabatan_id = $pegawai->jabatan_id;
        $this->unit_kerja_id = $pegawai->unit_kerja_id;
        $this->gaji = $pegawai->gaji;

        $this->jabatans = Jabatan::all();
        $this->unitKerjas = UnitKerja::all();
    }

    public function update()
    {
        $this->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jabatan_id' => 'required',
            'unit_kerja_id' => 'required',
            'gaji' => 'required|numeric',
        ]);

        $pegawai = Pegawai::findOrFail($this->pegawaiId);

        /** @var User $user */
        $user = auth()->user();

        $pegawai->update([
            'nip' => $this->nip,
            'nama' => $this->nama,
            'jabatan_id' => $this->jabatan_id,
            'unit_kerja_id' => $this->unit_kerja_id,
            'gaji' => $this->gaji,
            'user_id' => $user->id,
        ]);

        session()->flash('success', 'Data pegawai berhasil diperbarui.');
        return redirect()->route('pegawai.index');
    }

    public function render()
    {
        return view('livewire.pegawai.edit');
    }
}

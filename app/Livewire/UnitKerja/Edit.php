<?php

namespace App\Livewire\UnitKerja;

use Livewire\Component;
use App\Models\UnitKerja;
use Livewire\Attributes\Layout; 

#[Layout('components.layouts.app', ['title' => 'Mengubah Unit Kerja'])]

class Edit extends Component
{
    public $unitKerjaId;
    public $nama_unit;
    public $lokasi;

    public function mount($id)
    {
        $unit = UnitKerja::findOrFail($id);
        $this->unitKerjaId = $unit->id;
        $this->nama_unit = $unit->nama_unit;
        $this->lokasi = $unit->lokasi;
    }

    public function update()
    {
        $this->validate([
            'nama_unit' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        UnitKerja::where('id', $this->unitKerjaId)->update([
            'nama_unit' => $this->nama_unit,
            'lokasi' => $this->lokasi,
        ]);

        session()->flash('success', 'Unit kerja berhasil diperbarui.');
        return redirect()->route('unit-kerja.index');
    }

    public function render()
    {
        return view('livewire.unit-kerja.edit');
    }
}

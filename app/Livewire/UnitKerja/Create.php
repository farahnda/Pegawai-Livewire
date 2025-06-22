<?php

namespace App\Livewire\UnitKerja;

use Livewire\Component;
use App\Models\UnitKerja;
use Livewire\Attributes\Layout; 

#[Layout('components.layouts.app', ['title' => 'Menambah Unit Kerja'])]

class Create extends Component
{
    public $nama_unit;
    public $lokasi;

    public function save()
    {
        $this->validate([
            'nama_unit' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
        ]);

        UnitKerja::create([
            'nama_unit' => $this->nama_unit,
            'lokasi' => $this->lokasi,
        ]);

        session()->flash('success', 'Unit kerja berhasil ditambahkan.');
        return redirect()->route('unit-kerja.index');
    }

    public function render()
    {
        return view('livewire.unit-kerja.create');
    }

    public function delete($id)
{
    $unit = UnitKerja::findOrFail($id);
    $unit->delete();

    session()->flash('success', 'Unit Kerja berhasil dihapus.');
}

}

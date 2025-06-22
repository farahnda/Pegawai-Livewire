<?php

namespace App\Livewire\UnitKerja;
use Livewire\Attributes\Layout; 
use Livewire\Component;
use App\Models\UnitKerja;

#[Layout('components.layouts.app', ['title' => 'Manajemen Unit Kerja'])]
class Index extends Component
{
    public $unitKerjas;
    public $selectedUnit = null;

    public function mount()
    {
        $this->unitKerjas = UnitKerja::latest()->get();
    }

    public function show($id)
    {
        $this->selectedUnit = UnitKerja::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.unit-kerja.index');
    }

    public function delete($id)
    {
        $unit = UnitKerja::findOrFail($id);
        $unit->delete();

        session()->flash('success', 'Unit Kerja berhasil dihapus.');

        if ($this->selectedUnit && $this->selectedUnit->id == $id) {
            $this->selectedUnit = null;
        }

        $this->unitKerjas = UnitKerja::latest()->get(); 
    }
}

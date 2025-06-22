<?php

namespace App\Livewire\Jabatan;

use Livewire\Component;
use App\Models\Jabatan;

use Livewire\Attributes\Layout; 

#[Layout('components.layouts.app', ['title' => 'Manajemen Jabatan'])]
class Index extends Component
{
    public $jabatans;
    public $selectedJabatan = null;

    public function mount()
    {
        $this->jabatans = Jabatan::latest()->get();
    }

    public function show($id)
    {
        $this->selectedJabatan = Jabatan::find($id);
    }

    public function render()
    {
        return view('livewire.jabatan.index');
    }

    public function delete($id)
    {
        $jabatan = jabatan::findOrFail($id);
        $jabatan->delete();

        session()->flash('success', 'Jabatan berhasil dihapus.');

        if ($this->selectedJabatan && $this->selectedJabatan->id == $id) {
            $this->selectedJabatan = null;
        }

        $this->jabatans = Jabatan::latest()->get(); 
    }

}

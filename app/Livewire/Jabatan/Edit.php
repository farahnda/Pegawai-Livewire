<?php

namespace App\Livewire\Jabatan;

use Livewire\Component;
use App\Models\Jabatan;
use Livewire\Attributes\Layout; 

#[Layout('components.layouts.app', ['title' => 'Mengubah Jabatan'])]

class Edit extends Component
{
    public $jabatanId;
    public $nama_jabatan;
    public $tunjangan;

    public function mount($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $this->jabatanId = $jabatan->id;
        $this->nama_jabatan = $jabatan->nama_jabatan;
        $this->tunjangan = $jabatan->tunjangan;
    }

    public function update()
    {
        $this->validate([
            'nama_jabatan' => 'required|string|max:255',
            'tunjangan' => 'required|numeric|min:0',
        ]);

        Jabatan::where('id', $this->jabatanId)->update([
            'nama_jabatan' => $this->nama_jabatan,
            'tunjangan' => $this->tunjangan,
        ]);

        session()->flash('success', 'Jabatan berhasil diperbarui.');
        return redirect()->route('jabatan.index');
    }

    public function render()
    {
        return view(view: 'livewire.jabatan.edit');
    }
}

<?php

namespace App\Livewire\Jabatan;

use Livewire\Component;
use App\Models\Jabatan;
use Livewire\Attributes\Layout; 

#[Layout('components.layouts.app', ['title' => 'Menambah Jabatan'])]
class Create extends Component
{
    public $nama_jabatan;
    public $tunjangan;

    public function save()
    {
        $this->validate([
            'nama_jabatan' => 'required|string|max:255',
            'tunjangan' => 'required|numeric|min:0',
        ]);

        Jabatan::create([
            'nama_jabatan' => $this->nama_jabatan,
            'tunjangan' => $this->tunjangan,
        ]);

        session()->flash('success', 'Jabatan berhasil ditambahkan.');
        return redirect()->route('jabatan.index');
    }

    public function render()
    {
        return view('livewire.jabatan.create');
    }
}

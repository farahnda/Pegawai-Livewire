<?php

namespace App\Livewire\Gaji;

use Livewire\Component;
use App\Models\Pegawai;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app', ['title' => 'Data Gaji Pegawai'])]
class Index extends Component
{
    public $pegawais;

    public function mount()
    {
        $this->pegawais = Pegawai::with('jabatan')->get();
    }

    public function render()
    {
        return view('livewire.gaji.index');
    }
}


    <div class="container mt-4 d-flex justify-content-center">
        <div class="w-100" style="max-width: 1200px;">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Manajemen Unit Kerja</h4>
                <div>
                    <a href="{{ route('unit-kerja.create') }}" class="btn btn-success me-2">Tambah Unit Kerja</a>
                    <a href="{{ route('home') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>

            <div class="row">
                <!-- Tabel Unit Kerja -->
                <div class="col-md-8">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-primary text-white fw-bold">Daftar Unit Kerja</div>
                        <div class="card-body p-0">
                            <table class="table table-striped mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nama Unit</th>
                                        <th>Lokasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($this->unitKerjas as $unit)
                                        <tr>
                                            <td>{{ $unit->nama_unit }}</td>
                                            <td>{{ $unit->lokasi }}</td>
                                            <td>
                                                <button wire:click="show({{ $unit->id }})" class="btn btn-sm btn-info text-white">Lihat</button>
                                                {{-- <a href="{{ route('unit-kerja.edit', $unit->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <button type="button" class="btn btn-danger btn-sm" 
                                                        onclick="if (confirm('Yakin ingin menghapus unit kerja ini?')) { @this.call('delete', {{ $unit->id }}) }">
                                                        Hapus
                                                </button> --}}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="text-center text-muted">Belum ada data unit kerja</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Detail Unit Kerja -->
                <div class="col-md-4">
                    @if ($selectedUnit)
                        <div class="card shadow-sm">
                            <div class="card-header bg-secondary text-white fw-bold">Detail Unit Kerja</div>
                            <div class="card-body">
                                <p><strong>Nama Unit:</strong> {{ $selectedUnit->nama_unit }}</p>
                                <p><strong>Lokasi: </strong>{{ $selectedUnit->lokasi }}</p>
                                <div class="mt-3 d-flex justify-content-end">
                                    <a href="{{ route('unit-kerja.edit', $selectedUnit->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                                    <button wire:click="delete({{ $selectedUnit->id }})" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus jabatan ini?')">Hapus</button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


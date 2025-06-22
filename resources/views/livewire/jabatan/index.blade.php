<div class="container mt-4 d-flex justify-content-center">
    <div class="w-100" style="max-width: 1200px;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Manajemen Jabatan</h4>
            <div>
                <a href="{{ route('jabatan.create') }}" class="btn btn-success me-2">Tambah Jabatan</a>
                <a href="{{ route('home') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>

        <div class="row">
            <!-- Tabel Jabatan -->
            <div class="col-md-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white fw-bold">Daftar Jabatan</div>
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama Jabatan</th>
                                    <th>Tunjangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($this->jabatans as $jabatan)
                                    <tr>
                                        <td>{{ $jabatan->nama_jabatan }}</td>
                                        <td>Rp{{ number_format($jabatan->tunjangan, 0, ',', '.') }}</td>
                                        <td>
                                            <button wire:click="show({{ $jabatan->id }})" class="btn btn-sm btn-info text-white">Lihat</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">Belum ada data jabatan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Detail Jabatan -->
            <div class="col-md-4">
                @if ($selectedJabatan)
                    <div class="card shadow-sm">
                        <div class="card-header bg-secondary text-white fw-bold">Detail Jabatan</div>
                        <div class="card-body">
                            <p><strong>Nama Jabatan:</strong> {{ $selectedJabatan->nama_jabatan }}</p>
                            <p><strong>Tunjangan:</strong> Rp{{ number_format($selectedJabatan->tunjangan, 0, ',', '.') }}</p>
                            <div class="mt-3 d-flex justify-content-end">
                                <a href="{{ route('jabatan.edit', $selectedJabatan->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                                <button wire:click="delete({{ $selectedJabatan->id }})" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus jabatan ini?')">Hapus</button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

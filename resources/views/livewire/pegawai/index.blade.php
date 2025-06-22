<div class="container mt-4 d-flex justify-content-center">
    <div class="w-100" style="max-width: 1200px;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Manajemen Pegawai</h4>
            <div>
                <a href="{{ route('pegawai.create') }}" class="btn btn-success me-2">Tambah Pegawai</a>
                <a href="{{ route('home') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>

        <div class="row">
            <!-- Tabel Pegawai -->
            <div class="col-md-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white fw-bold">Daftar Pegawai</div>
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Unit Kerja</th>
                                    <th>Gaji</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($this->pegawais as $pegawai)
                                    <tr>
                                        <td>{{ $pegawai->nip }}</td>
                                        <td>{{ $pegawai->nama }}</td>
                                        <td>{{ $pegawai->jabatan->nama_jabatan ?? '-' }}</td>
                                        <td>{{ $pegawai->unitKerja->nama_unit ?? '-' }}</td>
                                        <td>Rp{{ number_format($pegawai->gaji, 0, ',', '.') }}</td>
                                        <td>
                                            <button wire:click="show({{ $pegawai->id }})" class="btn btn-sm btn-info text-white">Lihat</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">Belum ada data pegawai</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Detail Pegawai -->
            <div class="col-md-4">
                @if ($selectedPegawai)
                    <div class="card shadow-sm">
                        <div class="card-header bg-secondary text-white fw-bold">Detail Pegawai</div>
                        <div class="card-body">
                            <p><strong>NIP:</strong> {{ $selectedPegawai->nip }}</p>
                            <p><strong>Nama:</strong> {{ $selectedPegawai->nama }}</p>
                            <p><strong>Jabatan:</strong> {{ $selectedPegawai->jabatan->nama_jabatan ?? '-' }}</p>
                            <p><strong>Unit Kerja:</strong> {{ $selectedPegawai->unitKerja->nama_unit ?? '-' }}</p>
                            <p><strong>Gaji:</strong> Rp{{ number_format($selectedPegawai->gaji, 0, ',', '.') }}</p>

                            <div class="mt-3 d-flex justify-content-end">
                                <a href="{{ route('pegawai.edit', $selectedPegawai->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                                <button wire:click="delete({{ $selectedPegawai->id }})" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pegawai ini?')">Hapus</button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div>
    <div>
        <div class="container mt-4 d-flex justify-content-center">
            <div class="w-100" style="max-width: 1200px;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">Data Gaji Pegawai</h4>
                    <div>
                        <a href="{{ route('home') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>

                <!-- Tabel Gaji Pegawai -->
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white fw-bold">Gaji Pegawai</div>
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama Pegawai</th>
                                    <th>Jabatan</th>
                                    <th>Gaji Pokok</th>
                                    <th>Tunjangan</th>
                                    <th>Total Gaji</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pegawais as $pegawai)
                                    <tr>
                                        <td>{{ $pegawai->nama }}</td>
                                        <td>{{ $pegawai->jabatan->nama_jabatan }}</td>
                                        <td>Rp {{ number_format($pegawai->gaji, 0, ',', '.') }}</td>
                                        <td>Rp {{ number_format($pegawai->jabatan->tunjangan, 0, ',', '.') }}</td>
                                        <td>
                                            Rp {{
                                                number_format(
                                                    $pegawai->gaji + $pegawai->jabatan->tunjangan,
                                                    0,
                                                    ',',
                                                    '.'
                                                )
                                            }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">Belum ada data pegawai</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

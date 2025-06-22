<div>
    <div>
        <div class="container mt-4 d-flex justify-content-center">
            <div class="w-100" style="max-width: 1200px;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    @php
                        \Carbon\Carbon::setLocale('id');
                    @endphp
                    <h4 class="mb-0">Rekapitulasi Absensi Bulan {{ \Carbon\Carbon::create()->month($bulan)->translatedFormat('F') }} {{ $tahun }}</h4>
                    <div>
                        <a href="{{ route('home') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>

                <!-- Filter Bulan dan Tahun -->
                <div class="card mb-3 shadow-sm">
                    <div class="card-body d-flex align-items-end gap-3">
                        <div class="flex-fill">
                            <label class="form-label">Bulan</label>
                            <select wire:model="bulan" class="form-select">
                                <option value="">-- Pilih Bulan --</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}">{{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="flex-fill">
                            <label class="form-label">Tahun</label>
                            <select wire:model="tahun" class="form-select">
                                <option value="">-- Pilih Tahun --</option>
                                @for ($year = now()->year; $year >= now()->year - 5; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                        <div>
                            <button class="btn btn-primary" wire:click="generateLaporan">Tampilkan</button>
                        </div>
                    </div>
                </div>

                <!-- Tabel Rekap Absensi -->
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white fw-bold">Rekap Absensi</div>
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama Pegawai</th>
                                    <th>Hadir</th>
                                    <th>Izin</th>
                                    <th>Alfa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dataRekap as $pegawai)
                                    @php
                                        $hadir = $pegawai->absensis->where('status', 'hadir')->count();
                                        $izin = $pegawai->absensis->where('status', 'izin')->count();
                                        $alfa = $pegawai->absensis->where('status', 'alfa')->count();
                                    @endphp
                                    <tr>
                                        <td>{{ $pegawai->nama }}</td>
                                        <td>{{ $hadir }}</td>
                                        <td>{{ $izin }}</td>
                                        <td>{{ $alfa }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">Belum ada data absensi untuk bulan dan tahun ini.</td>
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

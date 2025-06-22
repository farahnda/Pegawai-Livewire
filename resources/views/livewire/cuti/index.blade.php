<div>
    <div>
        <div class="container mt-4 d-flex justify-content-center">
            <div class="w-100" style="max-width: 1200px;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">Pengajuan & Riwayat Cuti</h4>
                    <div>
                        <a href="{{ route('home') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>

                <!-- Form Pengajuan Cuti -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-primary text-white fw-bold">Ajukan Cuti</div>
                    <div class="card-body">
                        <form wire:submit.prevent="ajukanCuti">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tanggal Mulai</label>
                                    <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" wire:model.defer="tanggal_mulai">
                                    @error('tanggal_mulai') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tanggal Akhir</label>
                                    <input type="date" class="form-control @error('tanggal_akhir') is-invalid @enderror" wire:model.defer="tanggal_akhir">
                                    @error('tanggal_akhir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alasan</label>
                                <textarea class="form-control @error('alasan') is-invalid @enderror" wire:model.defer="alasan"></textarea>
                                @error('alasan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Ajukan Cuti</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Tabel Riwayat Cuti -->
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white fw-bold">Riwayat Cuti</div>
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Durasi (hari)</th>
                                    <th>Alasan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cutis as $cuti)
                                    <tr>
                                        <td>{{ $cuti->tanggal_mulai }}</td>
                                        <td>{{ $cuti->tanggal_akhir }}</td>
                                        <td>
                                            {{
                                                \Carbon\Carbon::parse($cuti->tanggal_mulai)
                                                    ->diffInDays(\Carbon\Carbon::parse($cuti->tanggal_akhir)) + 1
                                            }}
                                        </td>
                                        <td>{{ $cuti->alasan }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">Belum ada riwayat cuti</td>
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

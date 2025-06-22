<div class="container mt-4 d-flex justify-content-center">
    <div class="w-100" style="max-width: 600px;">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">📅 Form Absen Hari Ini</h5>
            </div>
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form wire:submit.prevent="simpan">
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="text" class="form-control" id="tanggal" value="{{ \Carbon\Carbon::today()->format('d-m-Y') }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status Kehadiran</label>
                        <select wire:model="status" class="form-select" id="status" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="hadir">Hadir</option>
                            <option value="izin">Izin</option>
                            <option value="alfa">Alfa</option>
                        </select>
                        @error('status') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-2">Simpan Absen</button>
                </form>

                <a href="{{ route('home') }}" class="btn btn-secondary w-100">← Kembali</a>
            </div>
        </div>
    </div>
</div>

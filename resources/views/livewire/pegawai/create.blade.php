<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white fw-bold">
            Tambah Pegawai
        </div>
        <div class="card-body">
            <form wire:submit.prevent="store">
                <div class="mb-3">
                    <label class="form-label">NIP</label>
                    <input type="text" class="form-control @error('nip') is-invalid @enderror" wire:model.defer="nip">
                    @error('nip') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" wire:model.defer="nama">
                    @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <select class="form-select @error('jabatan_id') is-invalid @enderror" wire:model.defer="jabatan_id">
                        <option value="">-- Pilih Jabatan --</option>
                        @foreach ($jabatans as $jabatan)
                            <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
                        @endforeach
                    </select>
                    @error('jabatan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Unit Kerja</label>
                    <select class="form-select @error('unit_kerja_id') is-invalid @enderror" wire:model.defer="unit_kerja_id">
                        <option value="">-- Pilih Unit Kerja --</option>
                        @foreach ($unitKerja as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->nama_unit }}</option>
                        @endforeach
                    </select>
                    @error('unit_kerja_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Gaji</label>
                    <input type="number" class="form-control @error('gaji') is-invalid @enderror" wire:model.defer="gaji">
                    @error('gaji') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('pegawai.index') }}" class="btn btn-secondary me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

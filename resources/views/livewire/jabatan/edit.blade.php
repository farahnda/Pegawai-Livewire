    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white fw-bold">
                Edit Jabatan
            </div>
            <div class="card-body">
                <form wire:submit.prevent="update">
                    <div class="mb-3">
                        <label class="form-label">Nama Jabatan</label>
                        <input type="text" class="form-control @error('nama_jabatan') is-invalid @enderror" wire:model.defer="nama_jabatan">
                        @error('nama_jabatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tunjangan</label>
                        <input type="number" class="form-control @error('tunjangan') is-invalid @enderror" wire:model.defer="tunjangan">
                        @error('tunjangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('jabatan.index') }}" class="btn btn-secondary me-2">Kembali</a>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

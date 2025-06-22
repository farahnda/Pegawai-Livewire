    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white fw-bold">
                Edit Unit Kerja
            </div>
            <div class="card-body">
                <form wire:submit.prevent="update">
                    <div class="mb-3">
                        <label class="form-label">Nama Unit Kerja</label>
                        <input type="text" class="form-control @error('nama_unit') is-invalid @enderror" wire:model.defer="nama_unit">
                        @error('nama_unit') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lokasi</label>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" wire:model.defer="lokasi">
                        @error('lokasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('unit-kerja.index') }}" class="btn btn-secondary me-2">Kembali</a>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

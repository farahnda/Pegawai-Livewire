<div>
    <x-auth-nav :title="'Register'">
        <div class="card shadow-sm p-4 w-100" style="max-width: 420px;">
            <h4 class="mb-3 fw-bold text-center">Buat Akun Baru</h4>

            @if (session('status'))
                <div class="alert alert-success small text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form wire:submit.prevent="register" class="d-flex flex-column gap-3">
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input wire:model="name" type="text" id="name" class="form-control" required autofocus placeholder="Nama lengkap">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input wire:model="email" type="email" id="email" class="form-control" required placeholder="nama@email.com">
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input wire:model="password" type="password" id="password" class="form-control" required placeholder="••••••••">
                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input wire:model="password_confirmation" type="password" id="password_confirmation" class="form-control" required placeholder="••••••••">
                    @error('password_confirmation') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Daftar</button>

                <div class="d-flex justify-content-between align-items-center mt-2">
                    <span class="small">Sudah punya akun?</span>
                    <a href="{{ route('login') }}" class="text-decoration-none small">Login di sini</a>
                </div>
            </form>
        </div>
    </x-auth-nav>
</div>

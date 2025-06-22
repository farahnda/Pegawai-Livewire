<div>
    <x-auth-nav :title="'Login'">
    <div class="card shadow-sm p-4 w-100" style="max-width: 420px;">
    <h4 class="mb-3 fw-bold text-center">Login ke Akun Anda</h4>

    @if (session('status'))
        <div class="alert alert-success small text-center">
            {{ session('status') }}
        </div>
    @endif

    <form wire:submit.prevent="login" class="d-flex flex-column gap-3">
        <div class="form-group">
            <label for="email">Email</label>
            <input wire:model="email" type="email" id="email" class="form-control" required autofocus placeholder="nama@email.com">
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input wire:model="password" type="password" id="password" class="form-control" required placeholder="••••••••">
            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-check">
            <input wire:model="remember" class="form-check-input" type="checkbox" id="remember">
            <label class="form-check-label" for="remember">Ingat Saya</label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>

        <div class="d-flex justify-content-between align-items-center mt-2">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-decoration-none small">Lupa kata sandi?</a>
            @endif
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-decoration-none small">Daftar akun</a>
            @endif
        </div>
    </form>
</div>

</x-auth-nav>
</div>
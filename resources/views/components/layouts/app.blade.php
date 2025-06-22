<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Manajemen Data Pegawai dan Jabatan' }}</title>
    <link rel="icon" href="data:,">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @livewireStyles
</head>
<body class="bg-gray-100 min-vh-100 d-flex flex-column">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-4">
        <span class="navbar-brand fw-bold">Data Pegawai dan Jabatan</span>
        <div class="ms-auto d-flex gap-2 align-items-center">
            @auth
                <span class="text-white small">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-danger btn-sm">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login</a>
                <a href="{{ route('register') }}" class="btn btn-light btn-sm text-primary">Sign Up</a>
            @endauth
        </div>
    </nav>

    <!-- Layout with Sidebar -->
    <div class="d-flex flex-grow-1">
        @auth
        <!-- Sidebar -->
        <aside class="bg-dark text-white shadow-sm p-4 d-flex flex-column min-vh-100" style="width: 150px;">
            <h5 class="text-center fw-bold mb-4">🛠️ Admin Panel</h5>
            <nav class="nav flex-column gap-2">
                <a href="{{ route('pegawai.index') }}" class="text-decoration-none text-white px-3 py-2 rounded bg-primary">Pegawai</a>
                <a href="{{ route('jabatan.index') }}" class="text-decoration-none text-white px-3 py-2 rounded bg-success">Jabatan</a>
                <a href="{{ route('unit-kerja.index') }}" class="text-decoration-none text-white px-3 py-2 rounded bg-warning text-dark">Unit Kerja</a>
                <a href="{{ route('absensi.index') }}" class="text-decoration-none text-white px-3 py-2 rounded bg-info text-dark">Laporan Absensi</a>
                <a href="{{ route('cuti.index') }}" class="text-decoration-none text-white px-3 py-2 rounded bg-danger">Pengajuan Cuti</a>
                <a href="{{ route('gaji.index') }}" class="text-decoration-none text-white px-3 py-2 rounded bg-secondary">Gaji Pegawai</a>
            </nav>
        </aside>
        @endauth

        <!-- Main Content -->
        <main class="flex-grow-1 p-4 overflow-auto">
            {{ $slot }}
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
</body>
</html>

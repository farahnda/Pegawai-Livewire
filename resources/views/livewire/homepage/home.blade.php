
    
    <div class="d-flex flex-grow-1">
        {{-- @auth
        <!-- Sidebar -->
        <aside class="bg-dark text-white shadow-sm p-4 d-flex flex-column min-vh-100" style="width: 250px;">
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
        @endauth --}}


        <!-- Main Content -->
        <main class="flex-grow-1 p-4 overflow-auto">
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h2 class="h4 fw-bold mb-1">Selamat datang, {{ Auth::user()->name ?? 'User' }}!</h2>
            <p class="text-muted mb-0">Silakan pilih fitur yang tersedia di bawah ini.</p>
        </div>
        <div>
            <a href="{{ route('absensi.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
                <i class="bi bi-calendar-check"></i> Absen Hari Ini
            </a>
        </div>
    </div>

            <!-- Fitur Cards -->
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('pegawai.index') }}" class="text-decoration-none">
                        <div class="card h-100 shadow-sm bg-primary text-white">
                            <div class="card-body">
                                <h5 class="card-title">Data Pegawai</h5>
                                <p class="card-text">Kelola data pegawai seperti NIP, nama, jabatan, unit kerja, dan gaji.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('jabatan.index') }}" class="text-decoration-none">
                        <div class="card h-100 shadow-sm bg-success text-white">
                            <div class="card-body">
                                <h5 class="card-title">Data Jabatan</h5>
                                <p class="card-text">Kelola daftar jabatan dan tunjangannya.</p>
                            </div>
                        </div>      
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                <a href="{{ route('unit-kerja.index') }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm bg-warning text-dark">
                        <div class="card-body">
                            <h5 class="card-title">Data Unit Kerja</h5>
                            <p class="card-text">Kelola unit kerja dan lokasi penempatannya.</p>
                        </div>
                    </div>
                </a>
            </div>
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('absensi.index') }}" class="text-decoration-none">
                        <div class="card h-100 shadow-sm bg-info text-dark">
                            <div class="card-body">
                                <h5 class="card-title">Laporan Absensi</h5>
                                <p class="card-text">Lihat rekap absensi bulanan setiap pegawai.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('cuti.index') }}" class="text-decoration-none">
                        <div class="card h-100 shadow-sm bg-danger text-white">
                            <div class="card-body">
                                <h5 class="card-title">Pengajuan Cuti</h5>
                                <p class="card-text">Ajukan dan kelola cuti dengan batas maksimal 12 hari per tahun.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('gaji.index') }}" class="text-decoration-none">
                        <div class="card h-100 shadow-sm bg-secondary text-white">
                            <div class="card-body">
                                <h5 class="card-title">Gaji Pegawai</h5>
                                <p class="card-text">Lihat total gaji berdasarkan gaji pokok + tunjangan.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </main>
    </div>


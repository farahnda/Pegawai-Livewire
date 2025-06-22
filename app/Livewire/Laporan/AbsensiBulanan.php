<?php 
namespace App\Livewire\Laporan;

use Livewire\Component;
use App\Models\Pegawai;
use App\Models\Absensi;
use App\Models\Cuti;
use Carbon\Carbon;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app', ['title' => 'Laporan Absensi'])]
class AbsensiBulanan extends Component
{
    public $bulan;
    public $tahun;
    public $rekapAbsensi = [];

    public function generateLaporan()
    {
        $this->rekapAbsensi = Pegawai::with(['absensis', 'cutis'])->get()->map(function ($pegawai) {
            $hadir = $pegawai->absensis->whereBetween('tanggal', $this->rangeTanggal())
                ->where('keterangan', 'hadir')->count();

            $izin = $pegawai->absensis->whereBetween('tanggal', $this->rangeTanggal())
                ->where('keterangan', 'izin')->count();

            $sakit = $pegawai->absensis->whereBetween('tanggal', $this->rangeTanggal())
                ->where('keterangan', 'sakit')->count();

            $alpha = $pegawai->absensis->whereBetween('tanggal', $this->rangeTanggal())
                ->where('keterangan', 'alpha')->count();

            $cutiHari = $pegawai->cutis->sum(function ($cuti) {
                // Hitung hanya yang termasuk dalam bulan ini
                $start = Carbon::parse($cuti->tanggal_mulai);
                $end = Carbon::parse($cuti->tanggal_akhir);
                $range = $this->rangeTanggal();

                if ($end < $range[0] || $start > $range[1]) return 0;

                $realStart = $start->greaterThan($range[0]) ? $start : $range[0];
                $realEnd = $end->lessThan($range[1]) ? $end : $range[1];

                return $realStart->diffInDays($realEnd) + 1;
            });

            return [
                'nip' => $pegawai->nip,
                'nama' => $pegawai->nama,
                'hadir' => $hadir,
                'izin' => $izin,
                'sakit' => $sakit,
                'alpha' => $alpha,
                'cuti' => $cutiHari,
                'total_hari' => $hadir + $izin + $sakit + $alpha + $cutiHari,
            ];
        })->toArray();
    }

    public function rangeTanggal()
    {
        $start = Carbon::createFromDate($this->tahun, $this->bulan, 1)->startOfMonth();
        $end = $start->copy()->endOfMonth();
        return [$start, $end];
    }

    public function render()
    {
        return view('livewire.laporan.absensi-bulanan');
    }
}
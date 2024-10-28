<?php

namespace App\Livewire;

use App\Charts\MonthlyUsersChart;
use App\Models\Bayar;
use App\Models\Car;
use App\Models\Member;
use App\Models\Transaksi;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{

    public $totalCars;
    public $totalMembers;
    public $totalTransaksi;
    public $totalPetugas;
    public $totalPendapatan;

    public function mount()
    {
        $this->totalCars = Car::count();
        $this->totalMembers = Member::count();
        $this->totalTransaksi = Transaksi::count();
        $this->totalPetugas = User::where('lvl', 'petugas')->count();
        $this->totalPendapatan = Bayar::with('total_bayar')->sum('total_bayar');
    }
    public function render(MonthlyUsersChart $peminjamanChart)
    {
        return view('layouts.dashboard', ['peminjamanChart' => $peminjamanChart->build()])->extends('layouts.master')->section('content');
    }
}

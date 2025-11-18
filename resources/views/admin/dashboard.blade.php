@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard Admin</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Selamat Datang, {{ Auth::user()->name }}!</li>
    </ol>

    <div class="row">
        <!-- Manajemen Pasien -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Manajemen Pasien</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Data Pasien</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-injured fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <a href="{{ route('admin.pasien.index') }}" class="btn btn-primary btn-sm mt-3 stretched-link">Buka Pasien</a>
                </div>
            </div>
        </div>

        <!-- Manajemen Dokter -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Manajemen Dokter</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Data Dokter</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-md fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <a href="{{ route('admin.dokter.index') }}" class="btn btn-success btn-sm mt-3 stretched-link">Buka Dokter</a>
                </div>
            </div>
        </div>

        <!-- Jadwal Dokter (YANG KITA PERBAIKI) -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jadwal Praktik</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Atur Jadwal</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <!-- Link ini sekarang sudah benar -->
                    <a href="{{ route('admin.jadwal-dokter.index') }}" class="btn btn-warning btn-sm mt-3 stretched-link text-dark">Atur Jadwal</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
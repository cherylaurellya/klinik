@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-success text-white">Dashboard Dokter</div>
        <div class="card-body">
            <h3>Halo, Dr. {{ Auth::user()->name }}</h3>
            <hr>
            <div class="d-grid gap-2 d-md-block">
                <a href="{{ route('dokter.rekam-medis.create') }}" class="btn btn-primary btn-lg">
                    📝 Buat Rekam Medis Baru
                </a>
                <a href="#" class="btn btn-outline-success btn-lg">
                    📅 Lihat Jadwal Praktik Saya
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
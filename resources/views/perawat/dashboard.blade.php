@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-info text-white">Dashboard Perawat</div>
        <div class="card-body">
            <h3>Halo, Ners {{ Auth::user()->name }}</h3>
            <p>Apa yang ingin Anda kerjakan hari ini?</p>
            <hr>
            <a href="#" class="btn btn-primary">Lihat Antrian Pasien</a>
            <a href="#" class="btn btn-secondary">Cek Jadwal Dokter</a>
        </div>
    </div>
</div>
@endsection
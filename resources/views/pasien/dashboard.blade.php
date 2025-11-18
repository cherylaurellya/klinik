@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-secondary text-white">Area Pasien</div>
        <div class="card-body">
            <h3>Selamat Datang, {{ Auth::user()->name }}</h3>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Riwayat Berobat</h5>
                            <p>Lihat catatan medis dan resep obat Anda.</p>
                            <a href="{{ route('pasien.rekam-medis.saya') }}" class="btn btn-primary">Buka Rekam Medis</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Informasi Pembayaran</h5>
                            <p>Lihat tagihan dan status pembayaran.</p>
                            <a href="#" class="btn btn-success">Cek Tagihan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
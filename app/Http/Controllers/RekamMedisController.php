<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use App\Models\Pasien;
use App\Models\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RekamMedisController extends Controller
{
    // Use Case: Dokter mengisi rekam medis (Form)
    public function create()
    {
        // Dokter hanya bisa mengisi rekam medis
        $this->authorize('create', RekamMedis::class); // Contoh penggunaan Policy

        $pasiens = Pasien::with('user')->get(); // Ambil daftar pasien
        // return view('dokter.rekam_medis.create', compact('pasiens'));
    }

    // Use Case: Dokter menyimpan rekam medis & resep
    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'tanggal' => 'required|date',
            'keluhan' => 'required|string',
            'diagnosis' => 'required|string',
            'tindakan' => 'nullable|string',
            'nama_obat' => 'nullable|string', // Validasi resep
            'dosis' => 'nullable|string',
            'aturan_pakai' => 'nullable|string',
        ]);

        $dokter = Auth::user()->dokter;

        DB::beginTransaction();
        try {
            // 1. Simpan Rekam Medis
            $rekamMedis = $dokter->rekamMedis()->create([
                'pasien_id' => $request->pasien_id,
                'tanggal' => $request->tanggal,
                'keluhan' => $request->keluhan,
                'diagnosis' => $request->diagnosis,
                'tindakan' => $request->tindakan,
                // perawat_id bisa diisi jika ada perawat yg login & assist
            ]);

            // 2. Simpan Resep jika ada
            if ($request->filled('nama_obat')) {
                Resep::create([
                    'rekam_medis_id' => $rekamMedis->id,
                    'nama_obat' => $request->nama_obat,
                    'dosis' => $request->dosis,
                    'aturan_pakai' => $request->aturan_pakai,
                ]);
            }

            DB::commit();
            // return redirect()->route('dokter.dashboard')->with('success', 'Rekam medis berhasil disimpan.');
            return response()->json(['message' => 'Rekam medis berhasil disimpan'], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            // return back()->withErrors(['error' => 'Gagal menyimpan data. ' . $e->getMessage()]);
            return response()->json(['error' => 'Gagal menyimpan data: ' . $e->getMessage()], 500);
        }
    }

    // Use Case: Dokter/Perawat melihat riwayat rekam medis pasien
    public function showByPasien(Pasien $pasien)
    {
        // Memastikan dokter/perawat hanya bisa melihat
        $rekamMedis = RekamMedis::where('pasien_id', $pasien->id)
            ->with('dokter.user', 'perawat.user', 'resep')
            ->latest('tanggal')
            ->get();
            
        // return view('...nama_view', compact('pasien', 'rekamMedis'));
        return response()->json($rekamMedis);
    }

    // Use Case: Pasien melihat rekam medisnya sendiri
    public function showRekamMedisSaya()
    {
        $pasien = Auth::user()->pasien;
        if (!$pasien) {
            abort(403, 'Anda bukan pasien.');
        }

        $rekamMedis = $pasien->rekamMedis()
            ->with('dokter.user', 'resep') // Pasien mungkin tidak perlu lihat perawat
            ->latest('tanggal')
            ->get();
            
        // return view('pasien.rekam_medis.index', compact('rekamMedis'));
        return response()->json($rekamMedis);
    }
}
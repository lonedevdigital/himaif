<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class PublicController extends Controller
{
    public function index()
    {
        return view('landing'); // Pastikan view landing ada
    }

    // --- BAGIAN INI TIDAK SAYA UBAH (TETAP SEPERTI KODE ANDA) ---
    public function data(Request $request)
    {
        $query = Member::query();

        // 1. SEARCH (Nama)
        if ($request->has('search') && $request->search != null) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }
        // 2. FILTER ANGKATAN
        if ($request->has('angkatan') && $request->angkatan != null) {
            $query->where('angkatan', $request->angkatan);
        }
        // 3. FILTER DIVISI
        if ($request->has('divisi') && $request->divisi != null) {
            $query->where('divisi', $request->divisi);
        }

        // 4. SORTING (Tertinggi/Terendah)
        $sortOrder = 'desc'; // Default Tertinggi
        if ($request->has('sort') && $request->sort == 'asc') {
            $sortOrder = 'asc'; // Terendah
        }
        
        $members = $query->orderBy('skor', $sortOrder)->get();

        // Data untuk Dropdown
        $listAngkatan = Member::select('angkatan')->distinct()->orderBy('angkatan', 'desc')->pluck('angkatan');
        $listDivisi = Member::select('divisi')->distinct()->pluck('divisi');

        return view('ranking', compact('members', 'listAngkatan', 'listDivisi'));
    }

    // --- NAH, INI FUNGSI TAMBAHAN BARU (UNTUK LIHAT RAPOR/DETAIL) ---
    public function show($id)
    {
        // Ambil data anggota beserta riwayat penilaiannya
        // Kita urutkan history-nya dari yang TERBARU (created_at desc)
        $member = Member::with(['assessments' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])->findOrFail($id);

        return view('member_detail', compact('member'));
    }
}
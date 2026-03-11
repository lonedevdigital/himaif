<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Assessment;

class AdminMemberController extends Controller
{
    public function index(Request $request)
    {
        // 1. SIAPKAN DATA UNTUK DROPDOWN FILTER
        // Ambil daftar divisi & angkatan unik dari database biar admin tinggal pilih
        $listDivisi = Member::select('divisi')->distinct()->orderBy('divisi')->pluck('divisi');
        $listAngkatan = Member::select('angkatan')->distinct()->orderBy('angkatan', 'desc')->pluck('angkatan');

        // 2. QUERY DASAR (MULAI PENCARIAN)
        $query = Member::query();

        // Cek Filter: Nama
        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        // Cek Filter: Angkatan
        if ($request->filled('angkatan')) {
            $query->where('angkatan', $request->angkatan);
        }

        // Cek Filter: Divisi
        if ($request->filled('divisi')) {
            $query->where('divisi', $request->divisi);
        }

        // 3. EKSEKUSI & GROUPING
        // Ambil data yang sudah disaring, urutkan, lalu kelompokkan per Angkatan
        $members = $query->orderBy('angkatan', 'desc')
                         ->orderBy('nama', 'asc')
                         ->get()
                         ->groupBy('angkatan');

        return view('admin.dashboard', compact('members', 'listDivisi', 'listAngkatan'));
    }

    public function create()
    {
        return view('admin.create');
    }

    // 1. SIMPAN ANGGOTA BARU (SET MODAL AWAL)
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'divisi' => 'required',
            'angkatan' => 'required',
            'skor' => 'required|numeric'
        ]);

        Member::create([
            'nama' => $request->nama,
            'divisi' => $request->divisi,
            'angkatan' => $request->angkatan,
            'skor_awal' => $request->skor, // Modal Awal (Tetap)
            'skor' => $request->skor       // Skor Berjalan (Berubah)
        ]);

        return redirect()->route('dashboard')->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('admin.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);
        
        // KITA HAPUS VALIDASI 'skor' DI SINI
        $request->validate([
            'nama' => 'required',
            'divisi' => 'required',
            'angkatan' => 'required',
            // 'skor' => 'required|numeric'  <-- INI SUDAH DIHAPUS BIAR GAK ERROR
        ]);

        // HANYA UPDATE NAMA, DIVISI, DAN ANGKATAN
        // Skor dibiarkan tetap (aman dari edit manual)
        $member->update($request->only(['nama', 'divisi', 'angkatan']));
        
        return redirect()->route('dashboard')->with('success', 'Data anggota diperbarui!');
    }

    public function destroy($id)
    {
        Member::findOrFail($id)->delete();
        return redirect()->route('dashboard')->with('success', 'Anggota dihapus!');
    }

    // --- FITUR BARU: HALAMAN PENILAIAN ---
    public function nilai($id)
    {
        $member = Member::findOrFail($id);
        return view('admin.penilaian', compact('member'));
    }

    // --- PROSES HITUNG RUMUS & SIMPAN CATATAN ---
   // ... fungsi lain biarkan saja ...

    public function storeNilai(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        // 1. SIMPAN DATA KEGIATAN BARU
        Assessment::create([
            'member_id' => $id,
            'nama_kegiatan' => $request->nama_kegiatan,
            'kategori' => $request->kategori, // rapat/progja/panitia
            'nilai' => $request->nilai,       // 0-100
            'catatan' => $request->catatan
        ]);

        // 2. HITUNG RATA-RATA TERPISAH (BUCKET SYSTEM)
        
        // A. Rata-rata RAPAT (Ambil semua nilai kategori 'rapat', lalu dirata-rata)
        $avgRapat = $member->assessments()->where('kategori', 'rapat')->avg('nilai');
        // Kalau belum pernah ikut rapat, pakai SKOR AWAL (biar gak nol)
        if(is_null($avgRapat)) $avgRapat = $member->skor_awal;

        // B. Rata-rata PROGJA
        $avgProgja = $member->assessments()->where('kategori', 'progja')->avg('nilai');
        if(is_null($avgProgja)) $avgProgja = $member->skor_awal;

        // C. Rata-rata PANITIA
        $avgPanitia = $member->assessments()->where('kategori', 'panitia')->avg('nilai');
        if(is_null($avgPanitia)) $avgPanitia = $member->skor_awal;

        // 3. RUMUS FINAL (BOBOT)
        // Rapat 20% | Progja 45% | Panitia 35%
        $skorAkhir = ($avgRapat * 0.20) + ($avgProgja * 0.45) + ($avgPanitia * 0.35);

        // Update Skor Anggota
        $member->update(['skor' => $skorAkhir]);

        return redirect()->route('dashboard')->with('success', 'Nilai tersimpan! Skor terupdate secara terpisah.');
    }
}
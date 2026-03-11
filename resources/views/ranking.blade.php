<!DOCTYPE html>
<html lang="id">
<head>
    <title>Klasemen HIMA IF</title>
    
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
    <script>function autoSubmit() { document.getElementById('filterForm').submit(); }</script>
</head>
<body class="bg-gray-100 min-h-screen p-4 md:p-8">
    
    <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
        <div class="flex items-center gap-4">
            <img src="{{ asset('img/logo.png') }}" style="height: 60px; width: auto;" class="drop-shadow-md">
            <div>
                <h1 class="text-3xl md:text-4xl font-black text-red-900 uppercase tracking-tighter leading-none">
                    KLASEMEN <span class="text-yellow-500">ANGGOTA</span>
                </h1>
                <p class="text-gray-500 font-bold text-sm tracking-wide">HIMA INFORMATIKA TEKNOKRAT</p>
            </div>
        </div>
        
        <a href="{{ url('/') }}" class="text-red-900 font-bold text-sm hover:underline flex items-center gap-1 transition">
            &larr; Kembali ke Beranda Awal
        </a>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-red-900 mb-8">
        <div class="flex justify-between items-center mb-4 border-b border-gray-100 pb-3">
            <h3 class="font-bold text-red-900 uppercase text-xs tracking-widest">Filter Pencarian</h3>
            <a href="{{ route('klasemen') }}" class="text-xs font-bold text-white bg-red-900 px-3 py-1 rounded hover:bg-red-800 transition">
                ↺ Reset
            </a>
        </div>

        <form id="filterForm" action="{{ route('klasemen') }}" method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <div class="col-span-2">
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Cari Nama Anggota..." 
                       class="w-full border-2 border-gray-200 p-2.5 rounded-lg focus:border-red-900 focus:ring-0 outline-none font-bold text-gray-700 transition"
                       onchange="autoSubmit()"> 
            </div>
            <select name="angkatan" onchange="autoSubmit()" class="w-full border-2 border-gray-200 p-2.5 rounded-lg font-semibold text-gray-600 focus:border-red-900 outline-none">
                <option value="">Semua Angkatan</option>
                @foreach($listAngkatan as $a) <option value="{{ $a }}" {{ request('angkatan') == $a ? 'selected' : '' }}>{{ $a }}</option> @endforeach
            </select>
            <select name="divisi" onchange="autoSubmit()" class="w-full border-2 border-gray-200 p-2.5 rounded-lg font-semibold text-gray-600 focus:border-red-900 outline-none">
                <option value="">Semua Divisi</option>
                @foreach($listDivisi as $d) <option value="{{ $d }}" {{ request('divisi') == $d ? 'selected' : '' }}>{{ $d }}</option> @endforeach
            </select>
            <select name="sort" onchange="autoSubmit()" class="w-full border-2 border-yellow-400 bg-yellow-50 p-2.5 rounded-lg font-bold text-red-900 focus:border-yellow-500 outline-none">
                <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Tertinggi 🥇</option>
                <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Terendah 🔻</option>
            </select>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-xl overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-red-900 text-white">
                <tr>
                    <th class="p-5 text-center font-black text-yellow-400">#</th>
                    <th class="p-5 font-bold uppercase tracking-wider text-sm">Nama Anggota</th>
                    <th class="p-5 font-bold uppercase tracking-wider text-sm">Divisi</th>
                    <th class="p-5 text-center font-bold uppercase tracking-wider text-sm">Angkatan</th>
                    <th class="p-5 text-right font-bold uppercase tracking-wider text-sm">Total Skor</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($members as $index => $m)
                    @php
                        $rank = $index + 1;
                        $bg = 'hover:bg-red-50 transition duration-150';
                        $icon = $rank;
                        $rankColor = 'text-gray-400';
                        
                        // Logika Emas/Perak/Perunggu
                        if(request('sort', 'desc') == 'desc') {
                            if($rank == 1) { $bg = 'bg-yellow-50'; $icon = '👑'; $rankColor = 'text-yellow-600 text-2xl'; }
                            if($rank == 2) { $bg = 'bg-gray-50'; $icon = '🥈'; $rankColor = 'text-gray-500 text-xl'; }
                            if($rank == 3) { $bg = 'bg-orange-50'; $icon = '🥉'; $rankColor = 'text-orange-600 text-xl'; }
                        }
                    @endphp

                    <tr class="{{ $bg }}">
                        <td class="p-4 text-center font-black {{ $rankColor }}">{{ $icon }}</td>
                        <td class="p-4">
                            <a href="{{ route('anggota.detail', $m->id) }}" class="group flex items-center gap-3">
                                <span class="font-bold text-gray-800 group-hover:text-red-900 transition">{{ $m->nama }}</span>
                                <span class="opacity-0 group-hover:opacity-100 text-[10px] bg-red-900 text-yellow-400 px-2 py-0.5 rounded-full font-bold transition transform group-hover:translate-x-1">
                                    LIHAT RAPOR ➜
                                </span>
                            </a>
                        </td>
                        <td class="p-4 text-sm font-semibold text-gray-500">{{ $m->divisi }}</td>
                        <td class="p-4 text-center text-sm font-semibold text-gray-500">{{ $m->angkatan }}</td>
                        <td class="p-4 text-right font-black text-xl text-red-900">
                            {{ number_format($m->skor, 1) }}
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="p-10 text-center text-gray-400 font-bold">Data tidak ditemukan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>
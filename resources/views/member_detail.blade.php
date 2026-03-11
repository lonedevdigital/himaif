<!DOCTYPE html>
<html lang="id">
<head>
    <title>Rapor Kinerja - {{ $member->nama }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 min-h-screen p-4 md:p-8">

    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden mb-8 border border-gray-100">
        <div class="bg-gradient-to-r from-red-900 to-red-800 p-8 text-white flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-black tracking-tight">{{ $member->nama }}</h1>
                <p class="text-red-100 font-medium mt-1">{{ $member->divisi }} | Angkatan {{ $member->angkatan }}</p>
            </div>
            <div class="text-center md:text-right bg-white/10 p-4 rounded-xl backdrop-blur-sm">
                <p class="text-xs text-red-100 uppercase font-bold tracking-widest mb-1">Skor Rata-rata</p>
                <p class="text-5xl font-black">{{ number_format($member->skor, 1) }}</p>
            </div>
        </div>
        
        <div class="p-4 bg-gray-50 border-b flex justify-between items-center text-sm">
            <span class="font-bold text-gray-500 uppercase tracking-wide">Skor Awal: {{ $member->skor_awal }} Poin</span>
            <a href="{{ route('klasemen') }}" class="font-bold text-red-800 hover:text-red-600 transition">&larr; KEMBALI KE KLASEMEN</a>
        </div>
    </div>

    <div class="max-w-4xl mx-auto space-y-4">
        <h3 class="font-bold text-gray-400 uppercase text-xs tracking-widest mb-4 ml-2">Riwayat Input Terbaru</h3>

        @forelse($member->assessments as $history)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 flex flex-col md:flex-row justify-between items-center gap-4 hover:shadow-md transition duration-300">
            
            <div class="flex items-center gap-4 w-full">
                <div class="w-12 h-12 rounded-full flex items-center justify-center text-2xl shrink-0 
                    {{ $history->kategori == 'rapat' ? 'bg-purple-100 text-purple-600' : '' }}
                    {{ $history->kategori == 'progja' ? 'bg-blue-100 text-blue-600' : '' }}
                    {{ $history->kategori == 'panitia' ? 'bg-orange-100 text-orange-600' : '' }}">
                    
                    @if($history->kategori == 'rapat') 📅 @endif
                    @if($history->kategori == 'progja') 🚀 @endif
                    @if($history->kategori == 'panitia') 🎪 @endif
                </div>

                <div class="flex-1">
                    <div class="flex justify-between items-start">
                        <h3 class="font-bold text-gray-800 text-lg">{{ $history->nama_kegiatan }}</h3>
                        <span class="md:hidden font-black text-xl {{ $history->nilai >= 70 ? 'text-green-600' : 'text-red-600' }}">{{ $history->nilai }}</span>
                    </div>
                    
                    <p class="text-xs text-gray-500 font-bold uppercase tracking-wide mb-1">
                        Kategori: {{ ucfirst($history->kategori) }}
                    </p>
                    
                    @if($history->catatan)
                        <p class="text-sm text-gray-600 italic bg-gray-50 p-2 rounded border border-gray-100 mt-1">"{{ $history->catatan }}"</p>
                    @endif
                    
                    <p class="text-xs text-gray-400 mt-2">{{ $history->created_at->isoFormat('dddd, D MMMM Y • H:mm') }}</p>
                </div>
            </div>

            <div class="hidden md:block text-right shrink-0 min-w-[80px]">
                <span class="block text-4xl font-black {{ $history->nilai >= 70 ? 'text-green-600' : 'text-red-600' }}">
                    {{ $history->nilai }}
                </span>
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">POIN</span>
            </div>

        </div>
        @empty
        <div class="text-center py-16 bg-white rounded-xl border-2 border-dashed border-gray-200">
            <p class="text-gray-400 font-medium">Belum ada riwayat kegiatan untuk anggota ini.</p>
        </div>
        @endforelse

    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIMA Informatika - Portal Transparansi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .bg-pattern {
            background-color: #ffffff;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%239C92AC' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="bg-gray-50 bg-pattern min-h-screen flex flex-col">

    <nav class="w-full py-4 px-6 md:px-12 flex justify-between items-center border-b border-gray-200 bg-white/90 backdrop-blur-md sticky top-0 z-50 shadow-sm">
        <div class="flex items-center gap-4">
            <div class="relative group cursor-pointer">
                <div class="absolute -inset-2 bg-gradient-to-r from-red-600/30 to-yellow-500/30 blur-md opacity-0 group-hover:opacity-100 transition duration-500 rounded-lg"></div>
                <img src="{{ asset('logo.png') }}" alt="Logo HIMA" class="relative h-16 w-auto object-contain drop-shadow-sm hover:scale-105 transition-transform duration-300">
            </div>
            <div class="flex flex-col">
                <h1 class="text-xl md:text-2xl font-extrabold text-gray-900 tracking-tight leading-none">HIMA INFORMATIKA</h1>
                <span class="text-[10px] md:text-xs font-bold text-red-800 tracking-widest uppercase mt-1">Universitas Teknokrat Indonesia</span>
            </div>
        </div>
        <div>
            <a href="/login" class="group flex items-center gap-2 text-sm font-bold text-gray-500 hover:text-red-900 transition-colors">
                <span class="hidden md:inline">Area Pengurus</span>
                <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center group-hover:bg-red-100 group-hover:text-red-900 transition">🔒</div>
            </a>
        </div>
    </nav>

    <main class="flex-1 flex items-center min-h-[85vh]">
        <div class="container mx-auto px-6 md:px-12 py-12 flex flex-col-reverse lg:flex-row items-center gap-12">
            <div class="flex-1 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 py-1 px-3 mb-6 text-xs font-bold tracking-widest text-red-900 bg-red-50 border border-red-100 rounded-full uppercase">
                    <span class="w-2 h-2 rounded-full bg-red-600 animate-pulse"></span> PORTAL DATA RESMI
                </div>
                <h2 class="text-4xl md:text-6xl font-black text-gray-900 leading-tight mb-6">
                    Transparansi <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-900 to-red-600">Skor & Kinerja.</span>
                </h2>
                <p class="text-lg text-gray-600 mb-8 leading-relaxed md:pr-16">
                    Platform digital untuk memantau keaktifan dan kontribusi seluruh anggota HIMA Informatika secara <i>real-time</i>.
                </p>
                <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                    <a href="{{ route('klasemen') }}" class="inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white bg-red-900 rounded-xl hover:bg-red-800 hover:scale-105 transition-all duration-200 shadow-xl shadow-red-900/20">
                        🏆 LIHAT KLASEMEN
                    </a>
                    <a href="#fitur" class="inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 hover:text-red-900 transition-all duration-200">
                        Pelajari Sistem
                    </a>
                </div>
                <div class="mt-10 pt-8 border-t border-gray-200 flex justify-center lg:justify-start gap-8">
                    <div>
                        <p class="text-3xl font-bold text-gray-900">100%</p>
                        <p class="text-xs text-gray-500 uppercase font-bold">TRANSPARAN</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold text-gray-900">24/7</p>
                        <p class="text-xs text-gray-500 uppercase font-bold">AKSES DATA</p>
                    </div>
                </div>
            </div>
            <div class="flex-1 relative w-full max-w-lg lg:max-w-full">
                <div class="absolute inset-0 bg-gradient-to-tr from-red-100 to-yellow-100 rounded-full blur-3xl opacity-50 transform translate-x-10 translate-y-10"></div>
                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" alt="Dashboard Data" class="relative z-10 rounded-2xl shadow-2xl border-4 border-white transform hover:-rotate-1 transition duration-500 object-cover h-[400px] w-full">
            </div>
        </div>
    </main>

    <section id="fitur" class="py-20 bg-white border-t border-gray-200">
        <div class="container mx-auto px-6 md:px-12">
            <div class="text-center mb-16">
                <h3 class="text-3xl font-black text-gray-900 mb-4">Bagaimana Sistem Ini Bekerja?</h3>
                <p class="text-gray-500 max-w-2xl mx-auto">Nilai transparansi adalah prioritas kami. Poin yang didapatkan anggota tercatat rapi dan dapat dipertanggungjawabkan.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-8 border border-gray-100 rounded-2xl bg-gray-50 hover:bg-white hover:shadow-xl transition duration-300">
                    <div class="w-14 h-14 bg-red-100 rounded-lg flex items-center justify-center text-3xl mb-6">📊</div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Input Data Real-time</h4>
                    <p class="text-gray-600 leading-relaxed">Setiap selesai kegiatan, admin langsung menginput skor keaktifan anggota ke dalam sistem.</p>
                </div>
                <div class="p-8 border border-gray-100 rounded-2xl bg-gray-50 hover:bg-white hover:shadow-xl transition duration-300">
                    <div class="w-14 h-14 bg-yellow-100 rounded-lg flex items-center justify-center text-3xl mb-6">🏆</div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Ranking Otomatis</h4>
                    <p class="text-gray-600 leading-relaxed">Website otomatis mengurutkan anggota dari skor tertinggi untuk memacu semangat kompetisi positif.</p>
                </div>
                <div class="p-8 border border-gray-100 rounded-2xl bg-gray-50 hover:bg-white hover:shadow-xl transition duration-300">
                    <div class="w-14 h-14 bg-blue-100 rounded-lg flex items-center justify-center text-3xl mb-6">🔍</div>
                    <h4 class="text-xl font-bold text-gray-900 mb-3">Akses Terbuka</h4>
                    <p class="text-gray-600 leading-relaxed">Data ini bukan rahasia. Seluruh mahasiswa dapat memantau kinerja divisi kapan saja.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-red-900 text-white py-12 mt-auto border-t-4 border-yellow-500">
        <div class="container mx-auto px-6 text-center">
            
            <h5 class="text-2xl font-extrabold tracking-tight mb-2">HIMA INFORMATIKA</h5>
            <p class="text-red-200 text-sm font-semibold tracking-widest uppercase mb-8">Universitas Teknokrat Indonesia</p>
            
            <div class="w-16 h-1 bg-yellow-500 mx-auto rounded-full mb-8"></div>

            <p class="text-red-100 text-xs">
                &copy; {{ date('Y') }} Sistem Informasi Internal. Dibuat untuk kepentingan organisasi.
            </p>
        </div>
    </footer>

</body>
</html>
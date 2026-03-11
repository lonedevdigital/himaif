<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HIMA Informatika - Universitas Teknokrat Indonesia</title>
    
    <link rel="icon" href="{{ url('img/logo.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ url('img/logo.png') }}" type="image/png">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    </head>
<body class="bg-white text-gray-900 antialiased selection:bg-red-900 selection:text-white">

    <nav class="fixed w-full z-50 bg-white/90 backdrop-blur-md border-b border-gray-100 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                
                <div class="flex items-center gap-3" data-aos="fade-down" data-aos-duration="800">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo HIMA" class="h-10 w-auto">
                    <div>
                        <h1 class="font-black text-xl leading-none text-red-900 tracking-tight">HIMA INFORMATIKA</h1>
                        <p class="text-[10px] font-bold text-gray-500 tracking-widest uppercase">Universitas Teknokrat Indonesia</p>
                    </div>
                </div>

                <div data-aos="fade-down" data-aos-duration="800" data-aos-delay="100">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/admin/dashboard') }}" class="font-bold text-sm text-red-900 bg-red-50 px-5 py-2.5 rounded-full hover:bg-red-100 transition">
                                Dashboard &rarr;
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="group flex items-center gap-2 font-bold text-sm text-gray-600 hover:text-red-900 transition">
                                <span class="bg-gray-100 group-hover:bg-red-50 p-2 rounded-full transition">🔒</span>
                                Area Pengurus
                            </a>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <div class="relative min-h-screen flex items-center justify-center pt-20 overflow-hidden">
        
        <div class="absolute inset-0 -z-10 h-full w-full bg-white bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px] opacity-50"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 flex flex-col md:flex-row items-center gap-12 md:gap-20 w-full">
            
            <div class="flex-1 text-center md:text-left pt-10 md:pt-0">
                
                <div data-aos="fade-up" data-aos-delay="0" class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-50 border border-red-100 text-red-800 text-xs font-bold uppercase tracking-wider mb-6">
                    <span class="w-2 h-2 rounded-full bg-red-600 animate-pulse"></span>
                    Portal Data Resmi
                </div>

                <h1 data-aos="fade-up" data-aos-delay="100" class="text-5xl md:text-7xl font-black text-gray-900 tracking-tight mb-6 leading-tight">
                    Transparansi <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-900 to-red-600">
                        Skor & Kinerja.
                    </span>
                </h1>

                <p data-aos="fade-up" data-aos-delay="200" class="text-lg text-gray-500 mb-10 leading-relaxed max-w-xl mx-auto md:mx-0">
                    Platform digital terintegrasi untuk memantau keaktifan, prestasi, dan kontribusi seluruh anggota HIMA Informatika secara <em>real-time</em>.
                </p>

                <div data-aos="fade-up" data-aos-delay="300" class="flex flex-col sm:flex-row items-center gap-4 justify-center md:justify-start">
                    <a href="{{ route('klasemen') }}" class="w-full sm:w-auto px-8 py-4 bg-red-900 text-white font-bold rounded-xl shadow-lg shadow-red-900/30 hover:bg-red-800 hover:scale-105 transition transform duration-300 flex items-center justify-center gap-2">
                        🏆 LIHAT KLASEMEN
                    </a>
                    
                    <a href="#" class="w-full sm:w-auto px-8 py-4 bg-white text-gray-700 border-2 border-gray-100 font-bold rounded-xl hover:border-red-200 hover:text-red-900 transition flex items-center justify-center">
                        Pelajari Sistem
                    </a>
                </div>

                <div data-aos="fade-up" data-aos-delay="400" class="mt-12 flex items-center justify-center md:justify-start gap-8 border-t border-gray-100 pt-8">
                    <div>
                        <p class="text-3xl font-black text-gray-900">100%</p>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Transparan</p>
                    </div>
                    <div>
                        <p class="text-3xl font-black text-gray-900">24/7</p>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Akses Data</p>
                    </div>
                </div>
            </div>

            <div class="flex-1 w-full max-w-lg relative" data-aos="fade-left" data-aos-delay="500" data-aos-duration="1000">
                <div class="absolute top-0 -right-4 w-72 h-72 bg-yellow-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
                <div class="absolute -bottom-8 -left-4 w-72 h-72 bg-red-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
                
                <div class="relative bg-gray-900 rounded-2xl shadow-2xl border border-gray-800 p-2 transform rotate-1 hover:rotate-0 transition duration-500">
                    <img src="https://cdn.dribbble.com/users/418188/screenshots/16388907/media/bc965705b1c97a8e2277d079415442be.png?resize=1600x1200&vertical=center" 
                         alt="Preview Dashboard" 
                         class="rounded-xl w-full h-auto object-cover opacity-90 hover:opacity-100 transition">
                    
                    <div class="absolute top-10 -left-6 bg-white p-4 rounded-xl shadow-xl border-l-4 border-red-600 animate-bounce">
                        <div class="flex items-center gap-3">
                            <div class="bg-green-100 p-2 rounded-full text-green-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase">Status Kinerja</p>
                                <p class="font-black text-gray-900 text-lg">Sangat Baik</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 800,
        });
    </script>
</body>
</html>
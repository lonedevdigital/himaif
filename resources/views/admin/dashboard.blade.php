<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-2xl text-red-900 leading-tight">
                Dashboard Admin
            </h2>
            <a href="{{ route('klasemen') }}" target="_blank" class="bg-red-900 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-red-800 border-b-4 border-red-950 transition">
                Lihat Klasemen Publik &rarr;
            </a>
        </div>
    </x-slot>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200 mb-8">
                <div class="flex flex-col md:flex-row justify-between items-end gap-4">
                    <form action="{{ route('dashboard') }}" method="GET" class="w-full md:w-3/4 grid grid-cols-1 md:grid-cols-4 gap-3">
                        <div class="col-span-1 md:col-span-1">
                            <label class="text-xs font-bold text-gray-500 uppercase">Cari Nama</label>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Ketik nama..." class="w-full border p-2 rounded-lg text-sm focus:ring-red-900 focus:border-red-900">
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase">Angkatan</label>
                            <select name="angkatan" class="w-full border p-2 rounded-lg text-sm bg-gray-50 cursor-pointer">
                                <option value="">Semua</option>
                                @foreach($listAngkatan as $a)
                                    <option value="{{ $a }}" {{ request('angkatan') == $a ? 'selected' : '' }}>{{ $a }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase">Divisi</label>
                            <select name="divisi" class="w-full border p-2 rounded-lg text-sm bg-gray-50 cursor-pointer">
                                <option value="">Semua</option>
                                @foreach($listDivisi as $d)
                                    <option value="{{ $d }}" {{ request('divisi') == $d ? 'selected' : '' }}>{{ $d }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-end gap-2">
                            <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-gray-700 w-full">
                                🔍 Cari
                            </button>
                            <a href="{{ route('dashboard') }}" class="bg-gray-200 text-gray-600 px-3 py-2 rounded-lg text-sm font-bold hover:bg-gray-300" title="Reset Filter">
                                ↺
                            </a>
                        </div>
                    </form>
                    <div class="w-full md:w-auto text-right">
                        <a href="{{ route('admin.create') }}" class="bg-red-900 text-white px-5 py-2.5 rounded-lg shadow-lg hover:bg-red-800 font-bold border-b-4 border-red-950 transition transform hover:-translate-y-1 block md:inline-block text-center">
                            + Tambah Anggota
                        </a>
                    </div>
                </div>
            </div>

            @forelse($members as $angkatan => $listAnggota)
                <div class="mb-4 mt-8 first:mt-0 flex items-center gap-3">
                    <div class="bg-yellow-500 w-3 h-8 rounded-r-md"></div>
                    <h3 class="text-2xl font-black text-gray-800">ANGKATAN {{ $angkatan }}</h3>
                    <span class="text-xs font-bold text-red-900 bg-red-100 px-2 py-1 rounded-full border border-red-200">
                        {{ count($listAnggota) }} Orang
                    </span>
                </div>

                <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl border border-gray-100 mb-10">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-red-900 text-white uppercase text-sm tracking-wider">
                            <tr>
                                <th class="p-4 text-center w-12 font-black text-yellow-400">No</th>
                                <th class="p-4 w-1/4">Nama Anggota</th>
                                <th class="p-4 w-1/4">Divisi</th>
                                <th class="p-4 text-center w-1/6">Skor</th>
                                <th class="p-4 text-center w-1/3">Aksi Admin</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            @foreach($listAnggota as $index => $m)
                            <tr class="hover:bg-yellow-50 transition group">
                                <td class="p-4 text-center font-bold text-gray-400">{{ $loop->iteration }}</td>
                                <td class="p-4 font-bold text-gray-800 group-hover:text-red-900 text-base">{{ $m->nama }}</td>
                                <td class="p-4 text-gray-600 font-medium">{{ $m->divisi }}</td>
                                <td class="p-4 text-center">
                                    <span class="px-3 py-1 rounded-full font-black text-xs {{ $m->skor < 70 ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                        {{ number_format($m->skor, 1) }}
                                    </span>
                                </td>
                                <td class="p-4 text-center flex justify-center items-center gap-2">
                                    <a href="{{ route('admin.nilai', $m->id) }}" class="bg-yellow-400 text-red-900 px-3 py-1.5 rounded text-xs font-black border-b-2 border-yellow-600 hover:bg-yellow-300 shadow-sm">+ NILAI</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="{{ route('admin.edit', $m->id) }}" class="text-gray-500 font-bold hover:text-blue-600 text-xs uppercase tracking-wide">Edit</a>
                                    <span class="text-gray-300">|</span>
                                    
                                    <form id="delete-form-{{ $m->id }}" action="{{ route('admin.delete', $m->id) }}" method="POST" class="inline">
                                        @csrf 
                                        @method('DELETE')
                                        
                                        <button type="button" onclick="tanyaDulu({{ $m->id }})" class="text-red-400 font-bold hover:text-red-600 text-xs uppercase tracking-wide">
                                            Hapus
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @empty
                <div class="text-center py-16 bg-white rounded-xl border-2 border-dashed border-gray-300 mt-6">
                    <p class="text-gray-400 text-lg font-bold">Data tidak ditemukan.</p>
                    <a href="{{ route('dashboard') }}" class="text-red-600 font-bold hover:underline">Reset Filter</a>
                </div>
            @endforelse

        </div>
    </div>

    <script>
        function tanyaDulu(id) {
            Swal.fire({
                title: 'Yakin mau hapus?',
                text: "Data anggota ini akan hilang permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#7f1d1d', // Warna Merah Maroon
                cancelButtonColor: '#6b7280',  // Warna Abu
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kalau user klik 'Ya', baru form dikirim ke Controller
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>

</x-app-layout>
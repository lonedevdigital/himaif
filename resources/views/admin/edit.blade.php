<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-red-900 leading-tight">
            Edit Data Anggota
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-xl border border-gray-100 p-8">
                
                <form action="{{ route('admin.update', $member->id) }}" method="POST" onsubmit="konfirmasiSimpan(event)">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-5">
                        <label class="block text-red-900 font-bold mb-2 uppercase text-xs tracking-wider">Nama Lengkap</label>
                        <input type="text" name="nama" 
                               value="{{ old('nama', $member->nama) }}"
                               class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:border-red-900 focus:ring-0 transition font-bold text-gray-700" 
                               required>
                    </div>

                    <div class="mb-5">
                        <label class="block text-red-900 font-bold mb-2 uppercase text-xs tracking-wider">Divisi</label>
                        <input type="text" name="divisi" 
                               value="{{ old('divisi', $member->divisi) }}"
                               class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:border-red-900 focus:ring-0 transition font-medium text-gray-700" 
                               required>
                    </div>

                    <div class="mb-8">
                        <label class="block text-red-900 font-bold mb-2 uppercase text-xs tracking-wider">Angkatan (Tahun)</label>
                        <input type="number" name="angkatan" 
                               value="{{ old('angkatan', $member->angkatan) }}"
                               class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:outline-none focus:border-red-900 focus:ring-0 transition font-bold text-gray-700" 
                               required>
                    </div>

                    <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                        <a href="{{ route('dashboard') }}" class="px-5 py-2.5 text-gray-500 font-bold hover:text-red-900 hover:bg-red-50 rounded-lg transition">
                            Batal
                        </a>
                        
                        <button type="submit" class="bg-red-900 text-white px-6 py-2.5 rounded-lg shadow-lg hover:bg-red-800 font-bold border-b-4 border-red-950 transition transform hover:-translate-y-1">
                            UPDATE DATA
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
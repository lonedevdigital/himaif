<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Anggota Baru</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('admin.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Nama Lengkap</label>
                        <input type="text" name="nama" class="w-full border rounded px-3 py-2" placeholder="Masukkan nama..." required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Divisi</label>
                        <input type="text" name="divisi" class="w-full border rounded px-3 py-2" placeholder="" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Angkatan (Tahun)</label>
                        <input type="number" name="angkatan" class="w-full border rounded px-3 py-2" value="2024" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Skor Awal</label>
                        <input type="number" name="skor" class="w-full border rounded px-3 py-2" value="0" required>
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 text-gray-600 border rounded hover:bg-gray-100">Batal</a>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded font-bold hover:bg-blue-700">SIMPAN DATA</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
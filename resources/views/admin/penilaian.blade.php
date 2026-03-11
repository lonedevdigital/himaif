<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Input Kinerja: {{ $member->nama }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg border-t-4 border-blue-600">
                
                <form action="{{ route('admin.nilai.store', $member->id) }}" method="POST">
                    @csrf
                    
                    <div class="mb-5">
                        <label class="block font-bold mb-2 text-gray-700">Nama Kegiatan</label>
                        <input type="text" name="nama_kegiatan" class="w-full border p-3 rounded-lg bg-gray-50 focus:bg-white focus:ring-2 focus:ring-blue-500" placeholder="Contoh: Rapat Bulanan Mei" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                        <div>
                            <label class="block font-bold mb-2 text-gray-700">Jenis Kegiatan</label>
                            <select name="kategori" class="w-full border p-3 rounded-lg bg-blue-50 font-bold text-gray-800 focus:ring-2 focus:ring-blue-500 cursor-pointer" required>
                                <option value="" disabled selected>-- Pilih Kategori --</option>
                                <option value="rapat">📅 Rapat (20%)</option>
                                <option value="progja">🚀 Progja Divisi (45%)</option>
                                <option value="panitia">🎪 Kepanitiaan (35%)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block font-bold mb-2 text-gray-700">Nilai (0 - 100)</label>
                            <input type="number" name="nilai" min="0" max="100" class="w-full border p-3 rounded-lg text-center font-black text-xl text-blue-600 placeholder-gray-300" placeholder="100" required>
                            <p class="text-xs text-gray-400 mt-1">*100 = Sempurna, 0 = Tidak Hadir</p>
                        </div>
                    </div>

                    <div class="mb-8">
                        <label class="block font-bold mb-2 text-gray-700">Catatan Khusus</label>
                        <textarea name="catatan" rows="3" class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Contoh: Hadir tepat waktu, aktif memberikan saran."></textarea>
                    </div>

                    <div class="flex justify-end gap-3 border-t pt-5">
                        <a href="{{ route('dashboard') }}" class="px-5 py-2 border rounded-lg hover:bg-gray-100 font-semibold text-gray-600">Batal</a>
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-blue-700 shadow-lg transition transform hover:scale-105">SIMPAN NILAI</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
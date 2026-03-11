# HIMA-IF UTI Score System 🏆

## 📸 Tampilan Aplikasi
<table>
  <tr>
    <td align="center"><b>Halaman Beranda</b></td>
    <td align="center"><b>Dashboard Admin</b></td>
    <td align="center"><b>Klasemen Anggota</b></td>
  </tr>
  <tr>
    <td><img src="img/beranda.png" width="300"></td>
    <td><img src="img/dashboard.png" width="300"></td>
    <td><img src="img/klasemen.png" width="300"></td>
  </tr>
</table>

Sistem manajemen penilaian kinerja dan klasemen skor keaktifan anggota **HIMA Informatika Universitas Teknokrat Indonesia**. Aplikasi ini dirancang untuk mendigitalisasi proses penilaian kinerja organisasi agar lebih transparan, objektif, dan real-time.

## 📊 Logika Penilaian (Bucket System)
Sistem ini menggunakan perhitungan rata-rata terpisah per kategori sebelum dikalkulasi menjadi skor akhir anggota:
* **Rapat**: Mengambil rata-rata nilai dari kategori 'Rapat' dengan bobot **20%**.
* **Progja Divisi**: Mengambil rata-rata nilai dari kategori 'Progja Divisi' dengan bobot **45%**.
* **Kepanitiaan**: Mengambil rata-rata nilai dari kategori 'Kepanitiaan' dengan bobot **35%**.

## 🚀 Fitur Utama
* **Dashboard Admin**: Manajemen data anggota (Tambah, Edit, Hapus) dengan fitur filter dinamis per angkatan dan divisi.
* **Popup Konfirmasi**: Integrasi SweetAlert2 pada fitur hapus, edit, dan simpan nilai untuk meminimalisir kesalahan input data.
* **Sistem Akumulasi & Rata-rata**: Kalkulasi otomatis skor akhir berdasarkan bobot kategori kegiatan yang telah ditentukan.
* **Waktu Real-time Indonesia**: Konfigurasi sistem menggunakan `Asia/Jakarta` sehingga waktu penginputan riwayat sesuai dengan Waktu Indonesia Barat (WIB).
* **Klasemen Publik**: Halaman tampilan skor yang dapat diakses oleh seluruh anggota untuk melihat peringkat secara transparan.

## 🛠️ Struktur Folder Views (Admin)
* `dashboard.blade.php`: Pusat kendali data anggota dan aksi hapus.
* `create.blade.php`: Formulir pendaftaran anggota baru ke dalam sistem.
* `edit.blade.php`: Pembaruan profil data diri anggota (Nama, Divisi, Angkatan).
* `penilaian.blade.php`: Halaman input poin kinerja berdasarkan kategori dan catatan khusus.

## 💻 Spesifikasi Teknis
* **Framework**: Laravel 11/12.
* **Bahasa Pemrograman**: PHP 8.2+.
* **Timezone**: Asia/Jakarta (WIB).
* **Database**: MySQL.
* **UI Framework**: Tailwind CSS.
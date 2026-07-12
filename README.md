# FitLife - Sistem Pendaftaran Anggota GYM

Aplikasi web CRUD untuk mengelola data pendaftaran anggota pusat kebugaran (GYM), dibuat untuk memenuhi Ujian Akhir Semester mata kuliah **Pemrograman Web (IF200103)**.

## Teknologi
- PHP (native, mysqli)
- JavaScript
- HTML + CSS
- MySQL (RDBMS)

## Struktur Halaman (persis 3 halaman sesuai soal)
1. **index.php** — Halaman utama, menampilkan seluruh data anggota gym dalam bentuk tabel. File ini juga menangani proses hapus data (lewat parameter `?hapus=id` setelah konfirmasi JavaScript).
2. **tambah.php** — Halaman form input data anggota baru. Proses simpan ke database ditangani di file yang sama (form submit ke dirinya sendiri).
3. **edit.php** — Halaman form edit data anggota, sekaligus tombol hapus. Proses update dan hapus data ditangani di file yang sama.

Tidak ada file "proses_*.php" terpisah — setiap halaman menangani tampilan sekaligus logic CRUD-nya sendiri, sehingga jumlah halaman tetap 3 sesuai ketentuan soal.

Navigasi antar halaman tersedia melalui navbar (Halaman Index, Input Data) dan tombol aksi (Tambah, Edit, Hapus, Batal/Kembali ke Index) di setiap halaman.

## Fitur
- Tambah data anggota (Create)
- Lihat data anggota (Read)
- Edit data anggota (Update)
- Hapus data anggota dengan konfirmasi JavaScript (Delete)
- Auto-isi harga berdasarkan paket membership yang dipilih (JavaScript)
- Badge status anggota (Aktif / Nonaktif)

## Cara Menjalankan (XAMPP/Laragon)
1. Copy folder project ini ke dalam folder `htdocs` (XAMPP) atau `www` (Laragon).
2. Jalankan Apache dan MySQL melalui XAMPP/Laragon Control Panel.
3. Buka **phpMyAdmin**, lalu import file `database/fitlife_db.sql` (ini akan otomatis membuat database `fitlife_db` beserta tabel dan data contoh).
4. Sesuaikan kredensial database di `config/koneksi.php` jika diperlukan (default: host `localhost`, user `root`, password kosong).
5. Buka browser dan akses: `http://localhost/UAS_FitLife/index.php`

## Struktur Folder
```
UAS_FitLife/
├── assets/
│   ├── css/style.css
│   └── js/script.js
├── config/
│   └── koneksi.php
├── database/
│   └── fitlife_db.sql
├── dokumentasi/
│   └── (isi dengan screenshoot aplikasi saat running)
├── index.php   (halaman index + proses hapus)
├── tambah.php  (halaman input + proses simpan)
├── edit.php    (halaman edit/hapus + proses update & hapus)
└── README.md
```

## Catatan Pengumpulan Tugas
Sesuai instruksi soal UAS:
1. Upload project ini ke GitHub dengan nama repository: `UAS_NAMA_NIM` (ganti dengan nama dan NIM Anda).
2. Tambahkan screenshoot aplikasi saat sedang running ke dalam folder `dokumentasi/`.
3. Kumpulkan hanya **link GitHub** di LMS, jangan upload file apapun.
4. Dikerjakan secara mandiri/perorangan.

## Langkah Upload ke GitHub
```bash
cd UAS_FitLife
git init
git add .
git commit -m "UAS Pemrograman Web - Sistem Pendaftaran Anggota GYM FitLife"
git branch -M main
git remote add origin https://github.com/username/UAS_ILHAM_124005007.git
git push -u origin main
```
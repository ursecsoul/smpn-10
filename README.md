# SMPN-10 Website Sekolah

Ini adalah **website profil sekolah SMPN 10** berbasis PHP yang menampilkan informasi seperti:
- Tentang sekolah
- Galeri foto
- Struktur pengurus
- Prestasi
- Halaman admin (mengelola konten)

---

##  Struktur Project
- /admin
- /bootstrap
- /pages
- *.php
- index.php

**Keterangan singkat:**
- `admin/` → berisi halaman admin untuk login, CRUD konten
- `bootstrap/` → assets seperti CSS/JS untuk style & layout
- `pages/` → halaman konten utama website
- file PHP lain → logika halaman

---

## Cara Kerja Utama Kode (Overview)

### 1. Pengaturan halaman
- File *entry point* utama adalah **index.php**
- Saat diakses, index akan memanggil file PHP lain berdasarkan parameter atau routing sederhana
- Layout dibangun dengan template header + footer + konten

### 2. Halaman admin
- Ada directory `admin/` yang berisi script untuk:
  - Login (auth)
  - Manajemen konten (tambah/edit/hapus)
  - Menampilkan form input dan tabel data
- Koneksi ke database ada di file `db.php` 

### 3. Assets seperti gambar & style
- Folder berisi banyak gambar (foto sekolah, guru, logo) yang digunakan di halaman front-end
- Folder `bootstrap/` menyimpan stylesheet dan JavaScript dari Bootstrap untuk tampilan responsive

### 4. Database
- Kode PHP terhubung ke database MySQL lewat file koneksi `koneksi.php` untuk menampilkan data dinamis seperti berita/prestasi.

---

## Teknologi yang Digunakan

- **PHP** — bahasa server-side untuk logika website
- **HTML / CSS / Bootstrap** — struktur dan tampilan halaman
- **Folder assets** — gambar dan media sekolah
- **Database MySQL** 

Bahasa dominan di repo ini: **PHP (~80%)**, **Hack (~10%)**, **HTML/CSS** sebagai frontend . 

---

## Cara Install & Run (Local)

1. Clone repo:
   ```bash
   git clone https://github.com/ursecsoul/smpn-10.git
   
2. Jalankan di server lokal (XAMPP / WAMP / Laragon):

tempatkan folder di htdocs/ atau www/

buka http://localhost/smpn-10

Buat database MySQL

Sesuaikan file koneksi (koneksi.php)

Import struktur DB jika ada SQL   

Penulis

[Adinda Rachmania]



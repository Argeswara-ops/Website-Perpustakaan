# Website Perpustakaan 📚✨

Website Perpustakaan digital berbasis web yang modern dan responsif, dibangun dengan menggunakan framework **Laravel 11/13** dan **Tailwind CSS v4 (Vite)**. Aplikasi ini dirancang untuk memudahkan pengelolaan buku (e-book), publikasi artikel edukatif, promosi melalui banner interaktif, serta memberikan pengalaman membaca dan menyimpan buku favorit yang menyenangkan bagi para pengguna.

---

## 🚀 Fitur Utama

### 1. Panel Publik (Pengunjung Umum)
- **Halaman Utama (Landing Page)**: Menampilkan banner promo, buku terpopuler/terbaru, dan artikel terbaru.
- **Katalog Buku**: Pencarian dan detail buku yang tersedia (termasuk informasi penulis, kategori, deskripsi, jumlah pembaca, dan preview cover).
- **E-Book Reader**: Fitur untuk membaca buku secara online (PDF/File Viewer).
- **Artikel Edukasi**: Membaca artikel bermanfaat seputar literasi, tips membaca, dan berita perpustakaan.
- **Autentikasi Pengguna**: Login, registrasi akun baru, dan sistem lupa password/reset password.

### 2. Panel Pengguna (User Dashboard)
- **Manajemen Profil**: Mengubah nama, email, password, dan foto profil.
- **Verifikasi Keamanan**: Pengiriman kode verifikasi/keamanan untuk perubahan password.
- **Daftar Favorit**: Menyimpan buku-buku favorit ke dalam daftar pustaka pribadi pengguna untuk dibaca nanti.

### 3. Panel Admin (Admin Dashboard)
- **Kelola Buku (CRUD)**: Menambah, mengubah, atau menghapus daftar buku, file e-book (PDF), dan mengunggah gambar cover buku.
- **Kelola Artikel (CRUD)**: Menulis dan mengedit artikel edukasi dengan lampiran gambar.
- **Kelola Banner (CRUD)**: Mengatur gambar promosi, link eksternal, dan teks promosi pada slider halaman depan.

---

## 🛠️ Teknologi yang Digunakan

- **Backend**: PHP >= 8.3 & Laravel Framework v13.x
- **Frontend Styling**: Tailwind CSS v4 & PostCSS
- **Bundler & Build Tool**: Vite v8.x
- **Database**: MySQL / PostgreSQL / SQLite (didukung oleh Eloquent ORM)
- **Tinker**: Laravel Tinker untuk shell interaksi database

---

## 📂 Struktur Database Utama

Aplikasi ini menggunakan skema database relasional berikut:
- **`users`**: Menyimpan data akun pengguna dan administrator (role-based).
- **`books`**: Menyimpan metadata buku (judul, penulis, deskripsi, views, path file PDF, cover).
- **`articles`**: Menyimpan konten artikel literasi dan gambar pendukung.
- **`banners`**: Menyimpan slide banner untuk halaman utama.
- **`favorites`**: Tabel relasi *many-to-many* menghubungkan `users` dan `books` sebagai tanda buku favorit.

---

## ⚙️ Panduan Instalasi Lokal

Ikuti langkah-langkah di bawah ini untuk menjalankan proyek di komputer Anda secara lokal:

### 1. Persyaratan Sistem
Pastikan komputer Anda sudah terinstall:
- PHP >= 8.3
- Composer (v2.x)
- Node.js (v18.x atau versi terbaru) & npm
- Server database (MySQL/MariaDB)

### 2. Kloning Repositori
```bash
git clone https://github.com/Argeswara-ops/Website-Perpustakaan.git
cd Website-Perpustakaan
```

### 3. Instalasi Dependensi PHP
```bash
composer install
```

### 4. Instalasi Dependensi Frontend
```bash
npm install
```

### 5. Konfigurasi Environment File
Salin file konfigurasi `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```
Buka file `.env` dan sesuaikan pengaturan database Anda:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=root
DB_PASSWORD=password_database_anda
```

### 6. Generate Application Key
```bash
php artisan key:generate
```

### 7. Migrasi Database & Seeding Data Dummy
Jalankan perintah berikut untuk membuat tabel-tabel dan mengisi data dummy awal (buku, artikel, banner):
```bash
php artisan migrate --seed
```

### 8. Build Aset & Jalankan Server Lokal
Untuk menjalankan server Laravel dan kompilasi aset frontend secara bersamaan, jalankan perintah:
```bash
npm run dev
```
Buka tautan yang muncul di terminal (biasanya `http://127.0.0.1:8000`) di browser Anda.

---

## 📜 Lisensi
Proyek ini bersifat open-source dan berada di bawah lisensi [MIT License](LICENSE).

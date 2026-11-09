# SMP Mentari - Dokumentasi Pertemuan 5

Proyek ini merupakan bagian dari modul pembelajaran Laravel yang berfokus pada implementasi operasi **CRUD (Create, Read, Update, Delete)**, manajemen konfigurasi dinamis menggunakan *caching*, pengembangan modul buku tamu digital, serta pengamanan rute aplikasi memanfaatkan *middleware* autentikasi.

---

## 📋 Daftar Isi
1. [Prasyarat & Lingkungan Kerja](#1-prasyarat--lingkungan-kerja)
2. [Langkah-Langkah Instalasi](#2-langkah-langkah-instalasi)
3. [Rincian Tugas & Implementasi](#3-rincian-tugas--implementasi)
4. [Fitur Utama Aplikasi](#4-fitur-utama-aplikasi)
5. [Pemetaan Rute & Otorisasi Akses](#5-pemetaan-rute--otorisasi-akses)

---

## 1. Prasyarat & Lingkungan Kerja

Sebelum menjalankan proyek ini, pastikan sistem Anda memenuhi spesifikasi perangkat lunak berikut:

| Perangkat / Package | Standar Versi | Fungsi / Peran Utama |
| :--- | :--- | :--- |
| **PHP** | Minimal `8.2` | *Runtime environment* utama |
| **Framework** | `Laravel 13.11.0` | Framework web backend & frontend |
| **Starter Kit** | `Laravel Breeze` | Modul autentikasi panel admin |
| **Database** | `MySQL` / `MariaDB` | Penyimpanan data relasional |
| **Asset Manager** | `Node.js` & `NPM` | *Bundler* assets (Vite / Tailwind / JS) |

---

## 2. Langkah-Langkah Instalasi

Ikuti petunjuk di bawah ini untuk mengonfigurasi dan menjalankan proyek di lingkungan lokal:

1. **Masuk ke Direktori Proyek:**
   ```bash
   cd SMP-Mentari
   ```

2. **Pasang Dependencies Frontend & Jalankan Compiler:**
   ```bash
   npm install
   npm run dev
   ```

3. **Konfigurasi Lingkungan (`.env`):**
   Pastikan berkas `.env` sudah dikonfigurasi sesuai dengan pengaturan basis data lokal Anda (nama database, username, dan password).

4. **Eksekusi Migrasi Basis Data:**
   ```bash
   php artisan migrate
   ```

5. **Jalankan Server Lokal:**
   ```bash
   php artisan serve
   ```
   Akses aplikasi melalui peramban web pada alamat `http://127.0.0.1:8000`.

---

## 3. Rincian Tugas & Implementasi

Berikut adalah poin-poin utama yang dikerjakan pada materi Pertemuan 5:

1. **Perancangan Skema Database:**  
   Menyusun struktur tabel relasional memanfaatkan fasilitas *migration* bawaan Laravel untuk mengelola data buku tamu dan kegiatan.
2. **Pemodelan Data & Caching:**  
   Mengimplementasikan *Eloquent ORM* untuk manipulasi data serta memanfaatkan *cache storage* untuk mempercepat *query* data berulang dan konfigurasi dinamis.
3. **Pengembangan Controller:**  
   Menyusun logika bisnis (*business logic*) dan mengendalikan alur pertukaran data antara model dan tampilan (*view*).
4. **Pengaturan Routing (`routes/web.php`):**  
   Menyusun pemetaan rute URL secara terstruktur untuk memisahkan area publik dari panel pengelolaan internal.
5. **Personalisasi Antarmuka (UI):**  
   Merancang antarmuka pengguna yang responsif untuk halaman publik pengunjung serta dasbor khusus administrator.

---

## 4. Fitur Utama Aplikasi

### A. Layanan Halaman Publik
* **Beranda Utama (`/`):** Pusat informasi profil, berita, dan pengumuman SMP Mentari.
* **Buku Tamu Digital (`/bukutamu`):** Form interaktif bagi pengunjung untuk mencatat riwayat kunjungan secara mandiri.

### B. Layanan Panel Admin (Terproteksi)
* **Dasbor Administrasi (`/dashboard`):** Ringkasan aktivitas sistem dan manajemen umum.
* **Manajemen Agenda Kegiatan (`/kegiatan`):** Modul CRUD lengkap untuk memperbarui data kegiatan sekolah.
* **Pengamanan Hak Akses:** Proteksi rute internal menggunakan *middleware* autentikasi agar hanya pengguna terdaftar (admin) yang dapat mengakses area pengolahan data.

---

## 5. Pemetaan Rute & Otorisasi Akses

| Halaman Sistem | Endpoint Rute | HTTP Method | Hak Akses / Otorisasi |
| :--- | :--- | :--- | :--- |
| Beranda Utama | `/` | `GET` | Terbuka (Publik) |
| Formulir Buku Tamu | `/bukutamu` | `GET` / `POST` | Terbuka (Publik) |
| Dasbor Utama | `/dashboard` | `GET` | Terproteksi (*Login Required*) |
| Kelola Kegiatan Sekolah | `/kegiatan` | `GET` / `POST` / `PUT` / `DELETE` | Terproteksi (*Login Required*) |

# LaraPress -Breeze
Dokumentasi ini mencakup materi dan tahap implementasi **Sistem Autentikasi Pengguna** pada proyek **LaraPress** menggunakan modul **Laravel Breeze**. Pembahasan berfokus pada mekanisme pendaftaran pengguna, otentikasi masuk (*login*), keamanan data sandi, hingga pengamanan akses rute internal aplikasi.

---

## 📋 Daftar Isi

1. [Prasyarat & Spesifikasi Lingkungan](#1-prasyarat--spesifikasi-lingkungan)
2. [Panduan Instalasi & Konfigurasi](#2-panduan-instalasi--konfigurasi)
3. [Cakupan Pelaksanaan Tugas](#3-cakupan-pelaksanaan-tugas)
4. [Ringkasan Fitur Keamanan & Sistem](#4-ringkasan-fitur-keamanan--sistem)
5. [Pemetaan Rute & Tingkat Otorisasi](#5-pemetaan-rute--tingkat-otorisasi)

---

## 1. Prasyarat & Spesifikasi Lingkungan

Sebelum memulai penyiapan proyek, pastikan perangkat keras dan perangkat lunak Anda memenuhi spesifikasi berikut:

| Perangkat / Modul | Versi Acuan | Peran dalam Sistem |
| :--- | :--- | :--- |
| **PHP** | Minimal `8.2` | *Runtime engine* utama |
| **Framework** | `Laravel 12.x` | *Base framework* backend & routing |
| **Starter Kit** | `Laravel Breeze` | Package manajemen autentikasi bawaan |
| **Database** | `MySQL` / `MariaDB` | Penyimpanan entitas `users`, `sessions`, dll. |
| **Asset Manager** | `Node.js` & `NPM` | Kompilasi Tailwind CSS dan skrip frontend |

---

## 2. Panduan Instalasi & Konfigurasi

Ikuti alur eksekusi berikut untuk menyiapkan sistem autentikasi Laravel Breeze pada proyek LaraPress:

1. **Pindah ke Direktori Proyek:**
   ```bash
   cd larapres
   ```

2. **Pemasangan Starter Kit Laravel Breeze:**
   ```bash
   composer require laravel/breeze --dev
   ```

3. **Inisialisasi Setup Breeze:**
   ```bash
   php artisan breeze:install
   ```
   * **Preset yang Dipilih:**
     * **Stack:** `Blade with Alpine`
     * **Dark Mode Support:** `No`
     * **Testing Framework:** `Pest`

4. **Kompilasi Asset Frontend:**
   ```bash
   npm install
   npm run dev
   ```

5. **Eksekusi Struktur Tabel (Migration):**
   ```bash
   php artisan migrate
   ```

6. **Menjalankan Server Lokal:**
   ```bash
   php artisan serve
   ```
   Aplikasi dapat diakses melalui browser pada URL `http://127.0.0.1:8000`.

---

## 3. Cakupan Pelaksanaan Tugas

Selama proses pengerjaan Pertemuan 4, berikut adalah poin-poin utama yang diselesaikan:

1. **Pemahaman Konsep Fundamental Keamanan:**
   * Memahami perbedaan dasar antara **Autentikasi** (verifikasi identitas) dan **Otorisasi** (penentuan hak akses).
   * Penerapan enkripsi kata sandi menggunakan alur *hashing* **Bcrypt**.
   * Proteksi form dari ancaman serangan *Cross-Site Request Forgery* (**CSRF**).
   * Pengelolaan status sesi pengguna memanfaatkan kombinasi *HTTP Cookies* dan *Session Storage*.

2. **Integrasi Laravel Breeze:** Mengonfigurasi modul autentikasi siap pakai pada aplikasi LaraPress.
3. **Penerapan Keamanan Rute:** Memproteksi endpoint sensitif seperti `/dashboard` dan `/profile` menggunakan *middleware* `auth`.
4. **Penyesuaian Antarmuka (UI Customization):** Merancang ulang serta menyesuaikan tampilan bawaan halaman masuk, pendaftaran, dasbor, dan pengaturan profil pengguna.

---

## 4. Ringkasan Fitur Keamanan & Sistem

* 🔐 **Registrasi & Login Terintegrasi:** Fasilitas alur pendaftaran akun baru serta verifikasi identitas pengguna yang aman.
* 🛡️ **Pengamanan Data & Proteksi CSRF:** Penyimpanan kata sandi dalam bentuk *hash* yang terenkripsi dan penyisipan token unik CSRF di setiap formulir input.
* 🚧 **Filtering Akses via Middleware (`auth`):** Pembatasan hak akses halaman internal secara otomatis; pengguna yang belum *login* akan dialihkan kembali ke halaman utama.
* 📊 **Panel Dasbor Utama:** Area kerja khusus terproteksi yang menyambut pengguna setelah proses autentikasi berhasil (`/dashboard`).
* 👤 **Manajemen Akun Mandiri:** Fitur bagi pengguna untuk memperbarui data pribadi serta mengubah pengaturan keamanan akun (`/profile`).

---

## 5. Pemetaan Rute & Tingkat Otorisasi

Berikut adalah struktur endpoint rute yang terbentuk beserta tingkat otorisasi aksesnya:

| Modul Halaman | Endpoint Rute | HTTP Method | Tingkat Otorisasi / Akses |
| :--- | :--- | :--- | :--- |
| **Formulir Login** | `/login` | `GET` / `POST` | Terbuka (Publik) |
| **Formulir Registrasi** | `/register` | `GET` / `POST` | Terbuka (Publik) |
| **Dasbor Utama** | `/dashboard` | `GET` | Terproteksi (*Login Required*) |
| **Pengelolaan Profil** | `/profile` | `GET` / `PATCH` / `DELETE` | Terproteksi (*Login Required*) |

# 🏪 LocalKita - Platform Direktori & E-Commerce Hiper-Lokal

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-3.x-38BDF8?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Status](https://img.shields.io/badge/Status-In_Development-orange?style=for-the-badge)]()

> **LocalKita** adalah platform direktori dan e-commerce yang dirancang untuk mendigitalisasi UMKM di kawasan **Tanah Seratus**. Platform ini mengatasi masalah *location search* melalui pemetaan digital berbasis Google Maps, petunjuk landmark lokal, katalog produk, indikator status toko *real-time*, serta sistem pemesanan langsung via WhatsApp tanpa biaya komisi.

---

## Daftar Isi

- [Latar Belakang](#-latar-belakang)
- [Tujuan Produk](#-tujuan-produk)
- [Teknologi & Referensi](#-teknologi--referensi)
- [Aktor Sistem & Peran](#-aktor-sistem--peran)
- [Fitur Utama](#-fitur-utama)
  - [Modul Buyer (Publik)](#1-modul-buyer-publik)
  - [Modul Seller (Pelaku UMKM)](#2-modul-seller-pelaku-umkm)
  - [Modul Admin (Pengelola)](#3-modul-admin-pengelola)
- [Persyaratan Non-Fungsional](#-persyaratan-non-fungsional)
- [Alur Kerja Sistem (User Flow)](#-alur-kerja-sistem-user-flow)
- [Panduan Instalasi & Pengoperasian](#-panduan-instalasi--pengoperasian)
- [Struktur Direktori Proyek](#-struktur-direktori-proyek)
- [Lisensi & Kredit](#-lisensi--kredit)

---

## Latar Belakang

Mayoritas pelaku UMKM di kawasan **Tanah Seratus** (sektor kuliner, jasa, hingga warung kelontong) masih mengandalkan pemasaran konvensional berbasis *word-of-mouth* dan lalu lintas fisik lokal. 

Kondisi ini menciptakan kendala tingginya **hambatan pencarian lokasi (*location search*)**, di mana petunjuk arah masih menggunakan acuan lisan yang tidak presisi (seperti *"depan masjid"* atau *"masuk gang"*). Akibatnya, calon konsumen dari luar kawasan maupun warga baru mengalami kesulitan menemukan titik pasti UMKM, sehingga jangkauan pasar menjadi terbatas dan potensi pendapatan pelaku usaha tidak optimal.

---

## Tujuan Produk

1. **Digitalisasi UMKM:** Menyediakan katalog digital terpusat untuk menampilkan produk dan jasa warga Tanah Seratus secara sistematis dan menarik.
2. **Navigasi Presisi:** Mengintegrasikan koordinat peta digital (Google Maps) dengan patokan lisan khas warga lokal (*landmark*) untuk menghilangkan kendala *location search friction* (Pasaribu, 2020).
3. **Transaksi Tanpa Hambatan:** Memfasilitasi pemesanan langsung via WhatsApp tanpa biaya komisi aplikasi guna menjaga efisiensi dan margin keuntungan pedagang kecil.

---

## Teknologi & Referensi

| Komponen | Spesifikasi / Detail |
| :--- | :--- |
| **Framework Backend** | [Laravel 12](https://laravel.com) |
| **Styling & CSS** | [Tailwind CSS](https://tailwindcss.com) |
| **Database** | MySQL |
| **Map Engine** | Google Maps Embed API |
| **Direct Order** | WhatsApp URL Scheme (`https://wa.me/`) |
| **Referensi Design UI** | Pinterest (Moodboard & Layout Grid) |
| **Referensi Website** | [Qoin Frontend](https://qoin-frontend-main.vercel.app/) |

---

## Aktor Sistem & Peran

| Aktor | Peran | Kebutuhan Utama |
| :--- | :--- | :--- |
| **`BUYER`** *(Pembeli / Warga)* | Konsumen lokal, warga baru, atau pendatang. | Mencari informasi produk, daftar harga, status toko (*buka/tutup*), lokasi presisi, dan pemesanan via WA. |
| **`SELLER`** *(Pelaku UMKM)* | Pemilik warung, penyedia jasa, kuliner. | Mengelola katalog produk (CRUD), mengatur status toko *real-time*, dan menerima pesan masuk via WA. |
| **`ADMIN`** *(Pengelola)* | Pengelola platform LocalKita. | Memverifikasi pendaftaran toko baru (*approval system*) dan mengelola kategori produk master. |

---

## Fitur Utama

### 1. Modul Buyer (Publik)
* **Pencarian & Filter:** Pencarian produk atau toko berdasarkan kata kunci nama atau kategori (*Kuliner, Jasa, Kelontong*).
* **Katalog Produk & Detail Harga:** Display produk interaktif lengkap dengan foto, nama barang, harga, dan deskripsi singkat.
*  **Maps & Landmark Integration:** 
  * Peta digital interaktif berbasis **Google Maps**.
  * Deskripsi patokan lokal khas warga (contoh: *"50 meter setelah Masjid Al-Ikhlas, sebelah kanan gang"*).
* **Order Direct via WhatsApp:** Tombol *"Pesan via WhatsApp"* yang otomatis menyusun draf format pesan belanjaan.
*  **Indikator Status Toko:** Label status *real-time* `[BUKA]` atau `[TUTUP]` langsung di halaman detail toko.

### 2. Modul Seller (Pelaku UMKM)
*  **Registrasi & Autentikasi:** Pendaftaran akun toko mandiri dan sistem autentikasi aman.
*  **Manajemen Profil Toko:** Pengaturan nama toko, deskripsi, alamat, *landmark* patokan, serta nomor WhatsApp aktif.
*  **Manajemen Katalog (CRUD Produk):** Menambah, melihat, memperbarui, dan menghapus produk/jasa beserta gambar dan variasi harga.
*  **Toggle Status Real-Time:** Sakelar *toggle* simpel untuk mengubah status operasional toko (*Buka/Tutup*) kapan saja secara instan.

### 3. Modul Admin (Pengelola)
*  **Approval Toko Baru:** Verifikasi pendaftaran akun Seller (*Approve/Reject*) untuk menjaga validitas toko yang tampil publik.
*  **Manajemen Kategori Master:** Mengatur kategori produk (*Makanan, Minuman, Servis Elektronik, Kelontong, dll.*).

---

## Persyaratan Non-Fungsional

1. **Responsivitas Tampilan (Mobile-First):** Dikarenakan sebagian besar target *Buyer* dan *Seller* mengakses via *smartphone*, antarmuka website wajib responsif 100%.
2. **Kemudahan Penggunaan (Usability):** Antarmuka dashboard *Seller* dirancang ringkas dan sederhana (*user-friendly*) agar gampang dioperasikan oleh semua usia.
3. **Kecepatan Muat Halaman (Performance):** Optimasi gambar katalog (*WebP/compression*) agar waktu *loading* halaman $\le 3$ detik pada jaringan seluler.

---

## Alur Kerja Sistem (User Flow)

```text
┌─────────────────────────────────────────────────────────────────────────────┐
│ BUYER FLOW                                                                  │
│ Buka Web ──► Cari Produk/Toko ──► Cek Status (BUKA) ──► Lihat Peta & Landmark│
│                                                            │                │
│                                                            ▼                │
│                                                   Klik Pesan via WA         │
└─────────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────────┐
│ SELLER FLOW                                                                 │
│ Daftar Toko ──► Tunggu Approval ──► Login ──► Input Produk ──► Toggle "BUKA"│
└─────────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────────┐
│ ADMIN FLOW                                                                  │
│ Login Admin ──► Cek Pendaftaran Baru ──► Verifikasi (Approve) ──► Toko Active│
└─────────────────────────────────────────────────────────────────────────────┘

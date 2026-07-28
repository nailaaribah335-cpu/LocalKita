# PRODUCT REQUIREMENT DOCUMENT (PRD)
Platform Direktori & E-Commerce "LocalKita"

Nama Website    : LocalKita
Area Fokus      : Kawasan Tanah Seratus
Framework 	: Laravel 12 + Tailwind
Referensi UI	: Pinterest
Referensi Web   : https://qoin-frontend-main.vercel.app/


1.Latar Belakang
Mayoritas pelaku UMKM di kawasan Tanah Seratus (sektor kuliner, jasa, hingga warung kelontong) masih mengandalkan pemasaran konvensional berbasis word-of-mouth dan lalu lintas fisik lokal. Hal ini menimbulkan kendala tingginya hambatan pencarian lokasi (location search), di mana petunjuk arah masih menggunakan acuan lisan yang tidak presisi (seperti "depan masjid" atau "masuk gang"). Akibatnya, calon konsumen dari luar kawasan maupun warga baru mengalami kesulitan menemukan lokasi UMKM, sehingga jangkauan pasar terbatas dan pendapatan pelaku usaha tidak optimal.

2 Tujuan Produk
1. Digitalisasi UMKM: Menyediakan katalog digital terpusat untuk menampilkan produk dan jasa warga Tanah Seratus secara sistematis.
2. Navigasi Presisi: Mengintegrasikan koordinat peta digital (Google Maps) dengan patokan lisan khas warga lokal (landmark) untuk menghilangkan kendala          location search friction (Pasaribu, 2020).
3. Transaksi Tanpa Hambatan: Memfasilitasi pemesanan langsung via WhatsApp tanpa biaya komisi aplikasi guna menjaga efisiensi usaha pedagang kecil.


3. TARGET PENGGUNA & AKTOR SISTEM 
* BUYER (Pembeli / Warga):
  - Peran: Konsumen lokal, warga baru, atau pendatang yang ingin mencari produk/jasa di Tanah Seratus.
  - Kebutuhan: Mencari informasi produk, daftar harga, status toko (buka/tutup), lokasi presisi, dan cara pemesanan yang mudah.

* SELLER (Pelaku UMKM):
  - Peran: Pemilik warung, penyedia jasa, atau usaha kuliner di kawasan Tanah Seratus.
  - Kebutuhan: Mengelola katalog produk, mengoperasikan status toko real-time, dan menerima pesanan masuk via WhatsApp.

* ADMIN (Pengelola):
  - Peran: Pengelola platform.
  - Kebutuhan: Memverifikasi pendaftaran toko baru (approval system) dan mengelola data master (kategori produk).


4. Fitur Modul Buyer (Publik)
- Pencarian & Filter: Pembeli dapat melakukan pencarian produk/toko berdasarkan nama atau kategori (Kuliner, Jasa, Kelontong).
- Katalog Produk & Detail Harga: Display produk yang mencakup foto, nama barang, harga, dan deskripsi singkat.
- Maps Integration: 
  * Tampilan peta digital berbasis Google Maps.
  * Deskripsi petunjuk landmark lokal (contoh: "50 meter setelah Masjid Al-Ikhlas, sebelah kanan gang").
- Order Direct via WhatsApp: Tombol "Pesan via WhatsApp" yang otomatis mengarahkan ke nomor Seller dengan draf pesan teks buatan sistem.
- Indikator Status Toko: Tampilan label real-time (BUKA) atau (TUTUP) di halaman detail toko.

5. Fitur Modul Seller (Pelaku UMKM)
- Registrasi & Autentikasi Seller: Pendaftaran akun toko baru dan login mandiri.
- Manajemen Profil Toko: Pengaturan nama toko, deskripsi, alamat, landmark patokan, dan nomor WhatsApp aktif.
- Manajemen Katalog (CRUD Produk): Menambah, melihat, mengubah, dan menghapus daftar produk/jasa beserta foto dan harga.
- Toggle Status Real-Time: Toggle switch untuk mengubah status toko menjadi "Buka" atau "Tutup" kapan saja.

6. Fitur Modul Admin (Pengelola)
- Approval Toko Baru: Sistem verifikasi (Approve/Reject) pendaftaran akun Seller baru sebelum toko dapat muncul di halaman publik.
- Manajemen Kategori: Menambah dan mengedit kategori produk (misal: Makanan, Minuman, Servis Elektronik, Kelontong).


7. FITUR LAINNYA 

1. Responsivitas Tampilan: Dikarenakan sebagian besar target Buyer dan Seller mengakses via smartphone, antarmuka website wajib responsif (responsive web design).
2. Kemudahan Penggunaan: Antarmuka dashboard Seller dirancang ringkas dan sederhana agar mudah dioperasikan oleh pelaku UMKM dari berbagai latar belakang usia.
3. Kecepatan Muat Halaman: Optimasi gambar katalog agar waktu pemuatan halaman (page load time) tidak melebihi 3 detik pada koneksi internet seluler.


8. ALUR KERJA UTAMA SISTEM 
(Pembeli)
Buka Website -> Cari Produk/Toko -> Cek Status (BUKA) -> Lihat Peta & Landmark 
-> Klik Pesan via WA -> Terhubung ke Seller

(Penjual)
Daftar Toko -> Tunggu Approval Admin -> Login -> Input Katalog Produk 
-> Aktifkan Toggle "BUKA" -> Terima Chat WA

(Admin)
Login Admin -> Cek Pendaftaran Toko Baru -> Verifikasi (Approve) 
-> Toko Tayang di LokalKita

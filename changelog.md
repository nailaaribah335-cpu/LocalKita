# Changelog UI Components - LocalKita

Semua perubahan dan penambahan komponen UI (User Interface) untuk platform Direktori & E-Commerce "LocalKita" akan dicatat pada file ini.

## [1.0.0-draft] - 2026-08-11

### Added
- **Authentication Pages (Login)**
  - Menggunakan stack Tailwind CSS sesuai kesepakatan PRD (Laravel 12 + Tailwind CSS).
  - **Komponen Card (Container):** Menggunakan kelas `bg-white p-8 rounded-xl shadow-lg` untuk menampung form.
  - **Komponen Form Input (Email & Password):** Menggunakan kelas `appearance-none rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500` agar terlihat modern dan bersih.
  - **Komponen Button (Masuk):** Menggunakan kelas `w-full flex justify-center py-2 px-4 rounded-lg text-white bg-blue-600 hover:bg-blue-700 transition-colors` sebagai Primary Call-to-Action (CTA).
  - **Layout Utama:** Dibungkus dalam container `min-h-screen flex items-center justify-center bg-gray-50` agar form login selalu berada di tengah layar.
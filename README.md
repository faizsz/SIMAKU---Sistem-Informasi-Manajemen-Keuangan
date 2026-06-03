# SIMAKU — Sistem Informasi Manajemen Keuangan Mahasiswa

> Platform manajemen keuangan mahasiswa terintegrasi berbasis web

![Laravel](https://img.shields.io/badge/Laravel-10-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.1-777BB4?style=flat-square&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=flat-square&logo=mysql&logoColor=white)
![Sanctum](https://img.shields.io/badge/Sanctum-3.3-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![AdminLTE](https://img.shields.io/badge/AdminLTE-3-3C8DBC?style=flat-square)
![Vercel](https://img.shields.io/badge/Deployed-Vercel-000000?style=flat-square&logo=vercel&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)

---

## Tentang Project

SIMAKU adalah sistem informasi berbasis web yang dirancang untuk mengelola keuangan mahasiswa secara terpusat. Sistem ini menangani seluruh alur pembayaran UKT mulai dari pembuatan tagihan, pembayaran, cicilan, hingga pengelolaan beasiswa — dengan tiga level akses pengguna yang terintegrasi dalam satu platform.

---

## Fitur Utama

### Mahasiswa
- Lihat tagihan UKT per semester
- Upload bukti pembayaran
- Ajukan cicilan dengan dokumen pendukung
- Pantau status cicilan secara realtime
- Lihat status penerima beasiswa
- Kelola profil akun

### Staff Keuangan
- Buat dan generate tagihan UKT massal
- Verifikasi & update status pembayaran
- Proses pengajuan cicilan (approve / reject)
- Kelola data banding UKT
- Lihat detail data mahasiswa
- Manajemen data beasiswa

### Admin
- Manajemen pengguna & role
- Kelola data master: Fakultas, Program Studi, Kelas, Tingkat
- Kelola Tahun Akademik & Periode Pembayaran
- Manajemen Enrollment Mahasiswa
- Kelola data Mahasiswa & Staff

---

## Tech Stack

| Layer | Teknologi |
|---|---|
| Backend | Laravel 10 (PHP 8.1) |
| Auth | Laravel Sanctum |
| Database | MySQL 8.0 (Aiven Cloud) |
| Frontend | Blade + AdminLTE 3 + Bootstrap 4 |
| Icons | Font Awesome |
| HTTP Client | Guzzle 7 |
| Hosting | Vercel (PHP Serverless) |

---

## Struktur Role

```
├── Admin        → manajemen master data & pengguna sistem
├── Staff        → operasional keuangan, verifikasi, cicilan
└── Mahasiswa    → self-service tagihan, pembayaran, cicilan
```

---

## Instalasi Lokal

### Prasyarat
- PHP >= 8.1
- Composer
- MySQL >= 8.0
- [Laragon](https://laragon.org/) / XAMPP

### Langkah Instalasi

**1. Clone repository**
```bash
git clone <repo-url>
cd SIMAKU
```

**2. Install dependencies**
```bash
composer install
```

**3. Setup environment**
```bash
cp .env.example .env
php artisan key:generate
```

**4. Konfigurasi database di `.env`**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=simaku
DB_USERNAME=root
DB_PASSWORD=
```

**5. Jalankan migrasi & seeder**
```bash
php artisan migrate --seed
```

**6. Jalankan server**
```bash
php artisan serve
```

Akses di `http://localhost:8000`

---

## Akun Demo (Seeder)

| Role | Username | Password |
|---|---|---|
| Admin / Staff / Mahasiswa | `4.33.2.3.01` s/d `4.33.2.3.12` | `12345678` |

> Role di-assign secara acak saat seeder. Cek tabel `users` untuk melihat role masing-masing akun.

---

## Deploy ke Vercel

Project ini sudah dikonfigurasi untuk Vercel menggunakan PHP serverless runtime (`vercel-php@0.6.2`).

### Environment Variables (wajib diset di Vercel Dashboard)

```env
APP_KEY=base64:...
APP_URL=https://<your-domain>.vercel.app

DB_CONNECTION=mysql
DB_HOST=<aiven-host>
DB_PORT=<aiven-port>
DB_DATABASE=<nama-database>
DB_USERNAME=<username>
DB_PASSWORD=<password>

MYSQL_ATTR_SSL_VERIFY_SERVER_CERT=false
```

### Catatan Konfigurasi Vercel

| Config | Value | Alasan |
|---|---|---|
| `SESSION_DRIVER` | `cookie` | Filesystem Vercel read-only |
| `CACHE_DRIVER` | `array` | Cache tidak persisten antar invocation |
| `VIEW_COMPILED_PATH` | `/tmp` | Satu-satunya writable path |
| `MYSQL_ATTR_SSL_VERIFY_SERVER_CERT` | `false` | Koneksi SSL ke Aiven tanpa CA file |

---

## Struktur Database

```
├── users                    → akun login semua role
├── mahasiswas               → data profil mahasiswa
├── staff                    → data profil staff
├── fakultas                 → data fakultas
├── program_studis           → data program studi
├── kelas                    → data kelas
├── tingkats                 → data tingkat/angkatan
├── tahun_akademiks          → data tahun akademik
├── golongan_ukts            → golongan UKT (I–VIII)
├── periode_pembayarans      → periode tagihan per semester
├── enrollment_mahasiswas    → enrollment mahasiswa per semester
├── ukt_semesters            → tagihan UKT per mahasiswa per semester
├── jenis_pembayarans        → jenis: kontan / cicilan
├── pembayaran_ukt_semesters → record pembayaran per tagihan
├── detail_pembayarans       → detail & bukti pembayaran
├── pengajuan_cicilans       → pengajuan cicilan mahasiswa
├── beasiswas                → daftar program beasiswa
├── penerima_beasiswas       → data penerima beasiswa
└── log_aktivitas            → log aktivitas sistem
```

---

## Arsitektur API

Semua route API berada di prefix `/api` dan dilindungi token Sanctum (`auth:sanctum`).

```
POST   /api/login

GET    /api/mahasiswa
GET    /api/staff
GET    /api/user

GET    /api/fakultas
GET    /api/program-studi
GET    /api/kelas
GET    /api/tingkat
GET    /api/tahun-akademik
GET    /api/golongan-ukt
GET    /api/periode-pembayaran
GET    /api/enrollment-mahasiswa

GET    /api/ukt-semester
GET    /api/pembayaran-ukt-semester
GET    /api/detail-pembayaran
GET    /api/pengajuan-cicilan
GET    /api/beasiswa
GET    /api/penerima-beasiswa
GET    /api/log-aktivitas
```

---

## License

MIT

# Panduan Instalasi Laravel Portfolio

Dokumentasi lengkap cara instalasi aplikasi **Laravel Portfolio** ke GitHub dan deployment ke subdomain Hostinger.

---

DISPLAY CTRL+SHIFT+V

## 📋 Daftar Isi

1. [Persiapan](#-persiapan)
2. [Push ke GitHub](#-push-ke-github)
3. [Deployment ke Hostinger](#-deployment-ke-hostinger)
4. [Konfigurasi Production](#-konfigurasi-production)
5. [Troubleshooting](#-troubleshooting)

---

## 🔧 Persiapan

### Prasyarat Lokal
- PHP >= 8.1
- Composer
- Node.js & NPM
- Git
- MySQL/MariaDB

### Prasyarat Server (Hostinger)
- Akun Hostinger dengan SSH Access
- Subdomain yang sudah dikonfigurasi
- MySQL Database yang sudah dibuat

---

## 📤 Push ke GitHub

### 1. Inisialisasi Git Repository

```bash
cd c:\Laravel 10\Laravel-porto
git init
```

### 2. Tambahkan Remote Origin

```bash
git remote add origin https://github.com/USERNAME/REPO-NAME.git
```

> Ganti `USERNAME` dan `REPO-NAME` dengan akun GitHub Anda

### 3. Build Assets untuk Production

```bash
npm install
npm run build
```

### 4. Tambahkan Build Assets ke Git

```bash
git add -f public/build
git add .
```

### 5. Commit dan Push

```bash
git commit -m "Initial commit - Laravel Portfolio"
git branch -M main
git push -u origin main
```

---

## 🚀 Deployment ke Hostinger

### 1. Koneksi SSH ke Server

```bash
ssh -p 65002 USERNAME@SERVER_IP
```

Contoh:
```bash
ssh -p 65002 u674511048@145.79.14.233
```

### 2. Navigasi ke Folder Subdomain

```bash
cd domains/farizahmad.com/public_html/porto
```

> Struktur folder Hostinger: `domains/DOMAIN/public_html/SUBDOMAIN`

### 3. Clone Repository dari GitHub

```bash
# Hapus folder lama jika ada
rm -rf *
rm -rf .*

# Clone repository
git clone https://github.com/USERNAME/REPO-NAME.git .
```

### 4. Install Dependencies

```bash
composer install --no-dev --optimize-autoloader
```

---

## ⚙️ Konfigurasi Production

### 1. Setup File Environment

```bash
cp .env.example .env
```

### 2. Generate Application Key

```bash
php artisan key:generate --show
```

Copy key yang muncul, lalu edit `.env`:

```bash
nano .env
```

### 3. Konfigurasi .env

```env
APP_NAME=Porto
APP_ENV=production
APP_KEY=base64:YOUR_GENERATED_KEY_HERE
APP_DEBUG=false
APP_URL=https://porto.farizahmad.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=u674511048_porto
DB_USERNAME=u674511048_porto
DB_PASSWORD=YOUR_DATABASE_PASSWORD

SESSION_DRIVER=file
CACHE_DRIVER=file
```

> **PENTING**: Ganti nilai database sesuai dengan kredensial dari hPanel Hostinger

### 4. Setup Storage Link

```bash
ln -sf ../storage/app/public public/storage
```

### 5. Jalankan Migration

```bash
php artisan migrate:fresh --force --seed
```

### 6. Cache Konfigurasi

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 7. Buat .htaccess Root

Buat file `.htaccess` di folder root project (bukan di folder public):

```bash
cat > .htaccess << 'EOF'
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
EOF
```

---

## 🔐 Kredensial Default

Setelah migration dengan seeder, akun admin default:

| Field | Value |
|-------|-------|
| Email | `admin@gmail.com` |
| Password | `password` |

> ⚠️ **PENTING**: Segera ganti password setelah login pertama!

---

## 🐛 Troubleshooting

### Error 500 - Unsupported Cipher

**Penyebab**: APP_KEY tidak valid

**Solusi**:
```bash
php artisan key:generate --show
# Copy key yang muncul ke .env
sed -i 's|APP_KEY=.*|APP_KEY=YOUR_NEW_KEY|' .env
php artisan config:cache
```

### Error 500 - Database Connection

**Penyebab**: Kredensial database salah

**Solusi**:
1. Cek kredensial di hPanel → Databases → MySQL
2. Update `.env` dengan kredensial yang benar
3. Jalankan `php artisan config:cache`

### NPM Not Found di Server

**Penyebab**: Shared hosting tidak menyediakan npm

**Solusi**: Build assets di lokal, lalu push ke GitHub:
```bash
# Di komputer lokal
npm run build
git add -f public/build
git commit -m "Add production build"
git push origin main

# Di server
git pull origin main
```

### Storage Link Error

**Penyebab**: Fungsi symlink tidak tersedia

**Solusi**: Buat symlink manual:
```bash
ln -sf ../storage/app/public public/storage
```

### Gambar Tidak Muncul

**Penyebab**: Folder storage kosong di server

**Solusi**: Upload ulang gambar melalui Admin Panel

---

## 📁 Struktur Folder Penting

```
Laravel-porto/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/           # Controller Admin Panel
│   │   └── LandingController.php
│   └── Models/              # Eloquent Models
├── database/
│   ├── migrations/          # Database Schema
│   └── seeders/             # Data Seeder
├── public/
│   ├── build/               # Compiled Assets (CSS/JS)
│   └── storage -> ../storage/app/public
├── resources/
│   ├── css/                 # Source CSS
│   ├── js/                  # Source JS
│   └── views/               # Blade Templates
├── storage/
│   └── app/public/          # Uploaded Files
└── .env                     # Environment Config
```

---

## 🔄 Update Aplikasi

Untuk update aplikasi di server setelah ada perubahan:

### Di Komputer Lokal:
```bash
# Jika ada perubahan CSS/JS
npm run build
git add -f public/build

# Commit dan push
git add .
git commit -m "Update: deskripsi perubahan"
git push origin main
```

### Di Server (SSH):
```bash
cd domains/farizahmad.com/public_html/porto
git pull origin main
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 📞 Informasi Server

| Item | Value |
|------|-------|
| SSH Host | `145.79.14.233` |
| SSH Port | `65002` |
| SSH User | `u674511048` |
| Subdomain | `porto.farizahmad.com` |
| GitHub Repo | `https://github.com/fariz7172/fariz-porto.git` |
| Database | `u674511048_porto` |

---

## ✅ Checklist Deployment

- [ ] Git repository diinisialisasi
- [ ] Remote origin ditambahkan
- [ ] Assets di-build (`npm run build`)
- [ ] Semua file di-commit dan di-push
- [ ] SSH ke server berhasil
- [ ] Repository di-clone ke server
- [ ] Composer dependencies diinstall
- [ ] File `.env` dikonfigurasi
- [ ] APP_KEY di-generate
- [ ] Database di-migrate
- [ ] Storage link dibuat
- [ ] Cache dikonfigurasi
- [ ] File `.htaccess` dibuat
- [ ] Website bisa diakses

---

*Dokumentasi terakhir diperbarui: 30 Desember 2025*

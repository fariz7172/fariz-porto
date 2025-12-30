# 🚀 Fariz Porto - Personal Portfolio

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/Tailwind_CSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS">
  <img src="https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/Vite-5.x-646CFF?style=for-the-badge&logo=vite&logoColor=white" alt="Vite">
</p>

<p align="center">
  <b>Website Portfolio Profesional dengan Admin Panel</b><br>
  Dibangun dengan Laravel & Tailwind CSS
</p>

---

## ✨ Fitur

- 🎨 **Landing Page Modern** - UI/UX yang responsif dan elegan
- 🔐 **Admin Panel** - Kelola konten portfolio dengan mudah
- 📁 **Manajemen Project** - CRUD lengkap untuk portfolio projects
- 👤 **Manajemen About** - Edit informasi profil dan skills
- 📞 **Manajemen Contact** - Kelola informasi kontak dan embed maps
- 🖼️ **Upload Gambar** - Upload gambar untuk hero section dan projects
- 🔍 **Filter Kategori** - Filter project berdasarkan tech stack
- 📱 **Fully Responsive** - Tampilan optimal di semua device

---

## 🛠️ Tech Stack

| Teknologi | Versi |
|-----------|-------|
| Laravel | 10.x |
| PHP | 8.1+ |
| Tailwind CSS | 3.x |
| Vite | 5.x |
| MySQL | 8.x |
| Laravel Breeze | Auth |

---

## 📦 Instalasi

### Prasyarat
- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL

### Langkah Instalasi

1. **Clone repository**
   ```bash
   git clone https://github.com/fariz7172/fariz-porto.git
   cd fariz-porto
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Konfigurasi database**
   
   Edit file `.env` dan sesuaikan:
   ```env
   DB_DATABASE=fariz_porto
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```

5. **Jalankan migrasi dan seeder**
   ```bash
   php artisan migrate --seed
   php artisan storage:link
   ```

6. **Build assets**
   ```bash
   npm run build
   # atau untuk development:
   npm run dev
   ```

7. **Jalankan server**
   ```bash
   php artisan serve
   ```

8. **Akses aplikasi**
   - Landing Page: `http://localhost:8000`
   - Admin Login: `http://localhost:8000/login`

---

## 📂 Struktur Project

```
fariz-porto/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/           # Admin controllers
│   │   └── LandingController.php
│   └── Models/              # Eloquent models
├── database/
│   ├── migrations/          # Database migrations
│   └── seeders/             # Database seeders
├── resources/
│   └── views/
│       ├── admin/           # Admin panel views
│       └── landing.blade.php
└── routes/
    └── web.php              # Web routes
```

---

## 🔑 Default Login

| Email | Password |
|-------|----------|
| admin@example.com | password |

> ⚠️ Ganti password setelah login pertama!

---

## 📸 Screenshots

### Landing Page
- Hero Section dengan animasi modern
- About Section dengan skills display
- Projects Section dengan filter kategori
- Contact Section dengan embedded map

### Admin Panel
- Dashboard dengan quick links
- Manajemen Projects (CRUD)
- Manajemen About & Contact

---

## 👨‍💻 Author

**Ahmad Farid**
- GitHub: [@fariz7172](https://github.com/fariz7172)

---

## 📄 License

Project ini menggunakan [MIT License](LICENSE).

---

<p align="center">
  Made with ❤️ by Ahmad Farid
</p>

<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Contact;
use App\Models\Project;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed About data
        About::create([
            'name' => 'Ahmad Farid',
            'title' => 'Fullstack Developer',
            'bio' => 'Saya adalah seorang Fullstack Developer dengan passion yang kuat dalam pengembangan web. Saya senang membangun aplikasi yang tidak hanya fungsional tetapi juga memiliki tampilan yang menarik dan user-friendly. Dengan pengalaman dalam berbagai teknologi seperti Laravel, PHP, JavaScript, dan database management, saya siap untuk membantu mewujudkan ide-ide Anda menjadi aplikasi yang nyata.',
            'phone' => '081280965725',
            'email' => 'nataliefariz69@gmail.com',
            'address' => 'Jalan Kalibaru Barat IV Rt 002 Rw 012, Kelurahan Kalibaru, Kecamatan Cilincing, Jakarta Utara',
            'skills' => ['Laravel', 'MySQL', 'Tailwind', 'JavaScript', 'REST API', 'Next.js'],
        ]);

        // Seed Contact data
        Contact::create([
            'phone' => '081280965725',
            'whatsapp' => '6281280965725',
            'email' => 'nataliefariz69@gmail.com',
            'address' => 'Jalan Kalibaru Barat IV Rt 002 Rw 012, Kelurahan Kalibaru, Kecamatan Cilincing, Jakarta Utara, DKI Jakarta',
            'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2!2d106.9!3d-6.1!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1f0000000001%3A0x0!2sKalibaru%2C%20Cilincing%2C%20Jakarta%20Utara!5e0!3m2!1sid!2sid!4v1703291000000!5m2!1sid!2sid',
            'map_link' => 'https://www.google.com/maps/search/Jalan+Kalibaru+Barat+IV+Cilincing+Jakarta+Utara',
            'social_links' => [],
        ]);

        // Seed Projects data
        $projects = [
            [
                'title' => 'E-Commerce Platform',
                'description' => 'Platform e-commerce lengkap dengan fitur cart, payment gateway, dan inventory management.',
                'full_description' => "Platform e-commerce modern yang dibangun dengan Laravel sebagai backend dan Vue.js untuk frontend yang interaktif. Fitur utama meliputi:\n\n• Sistem shopping cart dengan session management\n• Integrasi payment gateway (Midtrans/Xendit)\n• Inventory management dengan stock tracking\n• Order management dengan status updates\n• Dashboard admin untuk analitik penjualan\n• Multi-vendor support\n• Wishlist dan product reviews",
                'tech' => ['Laravel', 'Vue.js', 'MySQL'],
                'features' => ['Shopping Cart', 'Payment Gateway', 'Admin Dashboard', 'Multi-vendor'],
                'color' => 'from-blue-500 to-indigo-600',
                'year' => '2024',
                'sort_order' => 1,
            ],
            [
                'title' => 'Inventory System',
                'description' => 'Sistem manajemen inventori dengan tracking real-time dan laporan analytics.',
                'full_description' => "Sistem manajemen inventori enterprise-level untuk tracking stok barang dengan fitur:\n\n• Real-time stock monitoring\n• Barcode/QR code scanning\n• Multi-warehouse support\n• Low stock alerts & notifications\n• Detailed analytics dan reporting dengan Chart.js\n• Export laporan ke Excel/PDF\n• Role-based access control",
                'tech' => ['Laravel', 'Tailwind', 'Chart.js'],
                'features' => ['Real-time Tracking', 'Analytics', 'Multi-warehouse', 'Reporting'],
                'color' => 'from-emerald-500 to-teal-600',
                'year' => '2024',
                'sort_order' => 2,
            ],
            [
                'title' => 'Hotel Booking App',
                'description' => 'Aplikasi booking hotel dengan fitur pencarian, wishlist, dan sistem pembayaran.',
                'full_description' => "Aplikasi booking hotel fullstack dengan Next.js untuk performa optimal:\n\n• Advanced search dengan filters (lokasi, harga, rating, fasilitas)\n• Wishlist management untuk menyimpan hotel favorit\n• Booking system dengan calendar availability\n• Secure payment integration\n• Review dan rating system\n• Email notifications untuk konfirmasi booking\n• Responsive design untuk mobile dan desktop",
                'tech' => ['Next.js', 'Bootstrap', 'MySQL'],
                'features' => ['Search & Filter', 'Wishlist', 'Booking System', 'Reviews'],
                'color' => 'from-orange-500 to-red-600',
                'year' => '2024',
                'sort_order' => 3,
            ],
            [
                'title' => 'POS System',
                'description' => 'Point of Sale system dengan fitur kasir, member, dan laporan penjualan.',
                'full_description' => "Sistem Point of Sale lengkap untuk retail dan F&B:\n\n• Quick checkout dengan barcode scanner\n• Member management dengan loyalty points\n• Discount dan promo management\n• Shift management untuk kasir\n• Daily/weekly/monthly sales reports\n• Receipt printing (thermal printer support)\n• Multi-payment support (cash, card, e-wallet)\n• Return/refund handling",
                'tech' => ['Laravel', 'jQuery', 'MySQL'],
                'features' => ['Quick Checkout', 'Member Points', 'Reports', 'Multi-payment'],
                'color' => 'from-purple-500 to-pink-600',
                'year' => '2023',
                'sort_order' => 4,
            ],
            [
                'title' => 'CBT Application',
                'description' => 'Computer Based Test untuk ujian sekolah dengan multi-user dan bank soal.',
                'full_description' => "Aplikasi Computer Based Test (CBT) untuk institusi pendidikan:\n\n• Bank soal dengan kategori dan tingkat kesulitan\n• Multiple question types (pilihan ganda, essay, isian)\n• Timer dan auto-submit\n• Anti-cheat features (fullscreen mode, tab switch detection)\n• Real-time monitoring untuk pengawas\n• Automatic scoring untuk objektif questions\n• Detailed result analytics per siswa dan kelas\n• Export hasil ke Excel/PDF",
                'tech' => ['Next.js', 'Prisma', 'PostgreSQL'],
                'features' => ['Bank Soal', 'Anti-cheat', 'Auto Scoring', 'Analytics'],
                'color' => 'from-cyan-500 to-blue-600',
                'year' => '2024',
                'sort_order' => 5,
            ],
            [
                'title' => 'Access Control System',
                'description' => 'Sistem manajemen akses dengan role-based permissions dan audit log.',
                'full_description' => "Enterprise access control system dengan fitur keamanan lengkap:\n\n• Role-based Access Control (RBAC) dengan Spatie Permission\n• Hierarchical role management\n• Granular permission settings per modul\n• Complete audit logging\n• User activity tracking\n• Session management\n• Two-factor authentication (2FA)\n• IP whitelist/blacklist\n• Account lockout setelah failed attempts",
                'tech' => ['Laravel', 'Spatie', 'MySQL'],
                'features' => ['RBAC', 'Audit Log', '2FA', 'Session Management'],
                'color' => 'from-amber-500 to-orange-600',
                'year' => '2023',
                'sort_order' => 6,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}

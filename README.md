# Sesi 4. Migration
Memahami cara membuat migration dan tipe kolom untuk membuat table baru, mengupdate table yang sudah ada, menjalankan migration, rollback migration.

## Prasyarat
MySQL sudah terinstall dan running (bisa menggunakan XAMPP atau standalone)

## Pengaturan
Masukkan credentials database di file `.env`:
1. Buka file `.env` (jika belum ada, maka copy dan rename file `.env.example` menjadi `.env`)
2. Ubah credentials database `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
Sesuaikan credential dengan database yang Anda gunakan.

## File terkait
- `database/erd.png` - ERD struktur database yang akan dibuat
- `database/migrations/2026_09_14_021532_create_posts_table.php` - membuat table posts dengan soft delete
- `database/migrations/2026_09_14_021627_create_comments_table.php` - membuat table comments dengan soft delete
- `database/migrations/2026_09_14_025152_create_likes_table.php` - membuat table likes
- `database/migrations/2026_09_14_025157_create_follows_table.php` - membuat table follows
- `database/migrations/2026_09_14_030430_add_username_bio_image_to_users_table.php` - menambahkan kolom username, bio, dan image ke table users

## Cara menjalankan migration
```bash
php artisan migrate
```

## Cara rollback migration
```bash
php artisan migrate:rollback
```

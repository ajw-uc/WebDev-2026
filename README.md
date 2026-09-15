# Sesi 4. Migration
Menambahkan struktur database untuk fitur social media menggunakan Laravel Migration. Schema mencakup posts, comments, likes, dan relasi follows, serta menambahkan informasi profil `username`, `bio`, dan `image` pada tabel users. Migration juga menerapkan foreign key, unique constraint, cascade delete, timestamps, dan soft delete sesuai kebutuhan tiap tabel.

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
DB_DATABASE=webdev
DB_USERNAME=root
DB_PASSWORD=
```
Sesuaikan credential dengan database yang Anda gunakan.

## Cara membuat migration
```bash
php artisan make:migration create_posts_table
php artisan make:migration create_comments_table
php artisan make:migration create_likes_table
php artisan make:migration create_follows_table
php artisan make:migration add_username_bio_image_to_users_table
```

## File terkait
- `database/erd.png` - Diagram relasi tabel database
- `database/migrations/2026_09_14_021532_create_posts_table.php` - Membuat tabel posts, relasi ke users, image nullable, timestamps, dan soft delete
- `database/migrations/2026_09_14_021627_create_comments_table.php` - Membuat tabel comments dengan relasi ke posts dan users serta soft delete
- `database/migrations/2026_09_14_025152_create_likes_table.php` - Membuat tabel likes dengan unique pair post-user
- `database/migrations/2026_09_14_025157_create_follows_table.php` - Membuat tabel follows dengan relasi follower dan following ke users
- `database/migrations/2026_09_14_030447_add_username_bio_image_to_users_table.php` - Menambahkan kolom username, bio, dan image pada tabel users

## Cara menjalankan migration
```bash
php artisan migrate
```

## Cara rollback migration
```bash
php artisan migrate:rollback
```

## Referensi
- Migrations: https://laravel.com/docs/13.x/migrations
- Database relationships: https://laravel.com/docs/13.x/eloquent-relationships

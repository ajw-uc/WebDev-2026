# Sesi 13.A. Notification
Menambahkan sistem notifikasi untuk aktivitas komentar, like, dan follow. Notifikasi disimpan pada database serta dikirim melalui mail channel, ditampilkan pada dropdown navbar dan halaman daftar notifikasi, serta dapat ditandai sudah dibaca ketika dibuka.

## Membuat migration table notification
```
php artisan make:notifications-table
```

## Perintah untuk membuat notification
```
php artisan make:notification CommentNotification
php artisan make:notification LikeNotification
php artisan make:notification FollowNotification
```

## Alur notifikasi
- Komentar baru mengirim `CommentNotification` kepada pemilik post.
- Like baru mengirim `LikeNotification` kepada pemilik post.
- Follow baru mengirim `FollowNotification` kepada user yang diikuti.
- Notifikasi untuk aktivitas pada post milik sendiri tidak dibuat.
- Membuka notifikasi menandainya sebagai read dan mengarahkan user ke profil atau post terkait.

## File terkait
- `app/Http/Controllers/NotificationController.php` - mengambil notifikasi terpaginasikan dan menandai notifikasi sebagai read saat dibuka
- `app/Notifications/CommentNotification.php` - notifikasi komentar melalui database dan email
- `app/Notifications/LikeNotification.php` - notifikasi like melalui database dan email
- `app/Notifications/FollowNotification.php` - notifikasi follow melalui database dan email
- `app/Http/Controllers/PostController.php` - mengirim notifikasi saat komentar atau like berhasil dibuat
- `app/Http/Controllers/UserController.php` - mengirim notifikasi saat follow baru dibuat
- `database/migrations/2026_09_16_032220_create_notifications_table.php` - membuat tabel notifikasi dengan UUID, polymorphic notifiable, payload data, read timestamp, dan timestamps
- `resources/views/notifications/index.blade.php` - menampilkan seluruh notifikasi, state unread, waktu relatif, dan pagination
- `resources/views/layout/default.blade.php` - menampilkan hingga 10 notifikasi terbaru pada dropdown navbar dan link ke halaman lengkap
- `routes/web.php` - menambahkan route daftar dan pembukaan notifikasi dengan middleware `auth`

## Referensi
- Notifications: https://laravel.com/docs/13.x/notifications
- Database Notifications: https://laravel.com/docs/13.x/notifications#database-notifications
- Mail Notifications: https://laravel.com/docs/13.x/notifications#mail-notifications
- Marking Notifications as Read: https://laravel.com/docs/13.x/notifications#marking-notifications-as-read

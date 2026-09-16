# 20. Mailable dan Queue
Menambahkan fitur untuk mengirim ringkasan lima post terbaru dari akun yang diikuti ke email user, lengkap dengan halaman preview dan template email. Memperluas sistem notifikasi dengan queue agar pengiriman email berjalan asynchronous.

## Perintah untuk membuat mailable
```
php artisan make:mailable FollowedUsersFeedMail
```

## Perintah untuk membuat notification
```
php artisan make:notification CommentNotification
php artisan make:notification LikeNotification
php artisan make:notification FollowNotification
```

## Perintah untuk menjalankan queue
```
php artisan queue:work
```

## Alur email
- `CommentNotification`, `LikeNotification`, dan `FollowNotification` sekarang mengimplementasikan `ShouldQueue`.
- User terverifikasi dapat membuka preview feed email atau mengantrekan pengirimannya ke email sendiri.
- Email berisi maksimal lima post terbaru dari akun yang diikuti.
- Setiap post pada email memiliki link menuju detail post.

## File terkait
- `app/Http/Controllers/NotificationController.php` - mengelola daftar notifikasi dan penandaan read
- `app/Http/Controllers/FollowedUsersFeedController.php` - menyediakan preview dan mengantrekan email feed untuk user terverifikasi
- `app/Mail/FollowedUsersFeedMail.php` - mailable queued yang mengambil lima post terbaru dari akun yang diikuti
- `app/Notifications/CommentNotification.php` - notifikasi komentar melalui database dan email queue
- `app/Notifications/LikeNotification.php` - notifikasi like melalui database dan email queue
- `app/Notifications/FollowNotification.php` - notifikasi follow melalui database dan email queue
- `resources/views/emails/followed-users-feed.blade.php` - template HTML email ringkasan feed
- `resources/views/notifications/index.blade.php` - menampilkan notifikasi, state unread, waktu relatif, dan pagination
- `resources/views/layout/default.blade.php` - menampilkan notifikasi terbaru dan link ke halaman lengkap
- `database/migrations/2026_09_16_032220_create_notifications_table.php` - menyediakan tabel penyimpanan notifikasi database
- `routes/web.php` - menambahkan route preview dan send feed dengan middleware `auth` serta `verified`

## Referensi
- Mailables: https://laravel.com/docs/13.x/mail
- Queues: https://laravel.com/docs/13.x/queues

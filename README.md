# Sesi 13.C. User Verification
Menambahkan verifikasi email untuk memastikan user mengonfirmasi alamat email sebelum menggunakan fitur yang membutuhkan akun terverifikasi. Setelah signup atau login, user diarahkan ke halaman verifikasi dan dapat mengirim ulang email verifikasi dengan pembatasan request.

## Alur email
- User baru menerima email verifikasi setelah signup.
- User yang belum terverifikasi diarahkan ke halaman verifikasi setelah login.
- Link verifikasi menggunakan signed URL dan menyelesaikan verifikasi melalui `fulfill()`.
- Email verifikasi dapat dikirim ulang dengan rate limit 6 request per menit.
- `CommentNotification`, `LikeNotification`, dan `FollowNotification` sekarang mengimplementasikan `ShouldQueue`.
- User terverifikasi dapat membuka preview feed email atau mengantrekan pengirimannya ke email sendiri.
- Email berisi maksimal lima post terbaru dari akun yang diikuti.
- Setiap post pada email memiliki link menuju detail post.

## File terkait
- `app/Http/Controllers/NotificationController.php` - mengelola daftar notifikasi dan penandaan read
- `app/Http/Controllers/AuthController.php` - mengirim email verifikasi, menampilkan halaman verifikasi, memproses signed link, dan mengirim ulang email
- `app/Http/Controllers/FollowedUsersFeedController.php` - menyediakan preview dan mengantrekan email feed untuk user terverifikasi
- `app/Mail/FollowedUsersFeedMail.php` - mailable queued yang mengambil lima post terbaru dari akun yang diikuti
- `app/Notifications/CommentNotification.php` - notifikasi komentar melalui database dan email queue
- `app/Notifications/LikeNotification.php` - notifikasi like melalui database dan email queue
- `app/Notifications/FollowNotification.php` - notifikasi follow melalui database dan email queue
- `resources/views/emails/followed-users-feed.blade.php` - template HTML email ringkasan feed
- `resources/views/auth/verify-email.blade.php` - halaman pemberitahuan verifikasi dan tombol resend email
- `app/Models/User.php` - mengimplementasikan `MustVerifyEmail`
- `resources/views/notifications/index.blade.php` - menampilkan notifikasi, state unread, waktu relatif, dan pagination
- `resources/views/layout/default.blade.php` - menampilkan notifikasi terbaru dan link ke halaman lengkap
- `database/migrations/2026_09_16_032220_create_notifications_table.php` - menyediakan tabel penyimpanan notifikasi database
- `routes/web.php` - menambahkan route notice, verify, dan resend verification, serta memperketat fitur dengan middleware `verified`

## Referensi
- Email Verification: https://laravel.com/docs/13.x/verification
- Signed URLs: https://laravel.com/docs/13.x/urls#signed-urls

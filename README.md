# 22. Testing
Menambahkan pengujian otomatis menggunakan Pest untuk memverifikasi alur authentication, fitur social media, dan notifikasi. Feature test menguji request HTTP beserta perubahan database, sedangkan unit test memeriksa perilaku notification secara terisolasi.

## Cakupan pengujian
- Authentication: login user verified/unverified, signup dengan CAPTCHA valid, dan penolakan CAPTCHA invalid.
- Social feature: create post, komentar, like/unlike, follow/unfollow, dan update profile.
- Notification: memastikan notification dikirim kepada penerima yang sesuai.
- Unit test: memastikan notification menggunakan channel `database` dan `mail`.

## Penjelasan jenis test

- **Feature Test** menguji fitur dari sudut pandang user melalui request HTTP. Test ini dapat melibatkan route, middleware, controller, database, authentication, validation, dan notification secara bersamaan. Contohnya adalah menguji login, signup, membuat post, komentar, like, follow, dan update profile.
- **Unit Test** menguji bagian kecil aplikasi secara terisolasi, biasanya satu class atau satu method, tanpa menjalankan alur HTTP lengkap. Pada project ini, unit test digunakan untuk memastikan setiap notification memiliki channel `database` dan `mail`.
- Feature test menggunakan `RefreshDatabase` agar setiap test berjalan dengan database yang bersih dan perubahan data tidak memengaruhi test lainnya.

## Tentang Pest

Pest adalah testing framework untuk PHP yang digunakan sebagai test runner pada project Laravel ini. Pest dibangun di atas PHPUnit, tetapi menyediakan syntax yang lebih ringkas dan mudah dibaca.

Test Pest menggunakan fungsi seperti `it()` atau `test()` untuk mendeskripsikan skenario, kemudian menjalankan assertion melalui `$this` atau fungsi `expect()`. Contoh sederhana:

```php
it('returns a successful response', function () {
    $this->get('/')->assertStatus(200);
});

it('confirms a boolean value', function () {
    expect(true)->toBeTrue();
});
```

File `tests/Pest.php` berfungsi sebagai konfigurasi dasar test. Pada project ini, seluruh test di folder `Feature` menggunakan `TestCase` Laravel dan trait `RefreshDatabase`.

## Perintah untuk membuat file test
```
php artisan make:test AuthFeatureTest
php artisan make:test SocialFeatureTest
php artisan make:test ExampleTest
php artisan make:test NotificationUnitTest --unit
php artisan make:test ExampleTest --unit
```

## File test
- `tests/Pest.php` - mengaktifkan `RefreshDatabase` untuk feature test
- `tests/Feature/AuthFeatureTest.php` - menguji login dan signup termasuk validasi CAPTCHA
- `tests/Feature/SocialFeatureTest.php` - menguji post, komentar, like/unlike, follow/unfollow, dan update profile
- `tests/Feature/ExampleTest.php` - menguji response dasar aplikasi
- `tests/Unit/NotificationUnitTest.php` - menguji channel notification database dan mail
- `tests/Unit/ExampleTest.php` - contoh dasar unit test Pest

## Implementasi yang diuji
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

## Menjalankan aplikasi
```bash
composer install
php artisan migrate
php artisan storage:link
php artisan serve
```

Konfigurasikan database dan mailer pada `.env`. Untuk memproses email dan notifikasi yang masuk queue, jalankan worker pada terminal terpisah:

```bash
php artisan queue:work
```

Preview HTML feed tersedia di route `feed.email.preview`. Pengiriman feed dilakukan melalui route `feed.email.send` untuk user yang login dan sudah memverifikasi email.

## Menjalankan testing

Jalankan seluruh test:

```bash
php artisan test --compact
```

Jalankan test feature:

```bash
php artisan test --compact tests/Feature
```

Jalankan test unit:

```bash
php artisan test --compact tests/Unit
```

Jalankan file atau test tertentu:

```bash
php artisan test --compact tests/Feature/AuthFeatureTest.php
php artisan test --compact --filter="creates a comment"
```

Test feature menggunakan `RefreshDatabase`, sehingga database test harus dapat dibuat dan di-reset secara otomatis.

## Referensi
- Pest: https://pestphp.com/docs
- Laravel HTTP Tests: https://laravel.com/docs/13.x/http-tests
- Database Testing: https://laravel.com/docs/13.x/database-testing
- Notifications Testing: https://laravel.com/docs/13.x/notifications#testing

# 18. Security
Menambahkan pengamanan pada authentication, pembuatan post, dan penambahan komentar. Signup dilindungi CAPTCHA, endpoint sensitif diberi rate limiter berdasarkan IP atau user, dan pembuatan post beserta upload gambar dijalankan dalam database transaction agar data serta file tetap konsisten saat terjadi kegagalan.

## Perubahan keamanan
- CAPTCHA signup dibuat menggunakan `gregwar/captcha`, disimpan di session, lalu diverifikasi sebelum user dibuat. Jalankan perintah berikut:
```
composer require gregwar/captcha
```
- Rate limit diterapkan pada login, signup, pembuatan post, dan komentar.
- Pembuatan post dan penyimpanan gambar menggunakan `DB::transaction()`.
- File gambar yang sudah tersimpan dibersihkan kembali jika transaksi gagal.
- File upload disimpan menggunakan nama unik otomatis dari Laravel melalui method `store()`.

## File terkait
- `composer.json` - menambahkan dependency `gregwar/captcha`
- `app/Http/Controllers/AuthController.php` - membuat CAPTCHA signup, menyimpan phrase ke session, dan memvalidasi jawaban CAPTCHA
- `app/Http/Controllers/PostController.php` - membungkus pembuatan post dan upload gambar menggunakan `store()` dalam transaction serta membersihkan file saat exception
- `app/Providers/AppServiceProvider.php` - mendefinisikan rate limiter login, signup, post, dan comment
- `resources/views/auth/signup.blade.php` - menampilkan gambar CAPTCHA dan input jawaban CAPTCHA
- `routes/web.php` - menerapkan middleware throttle pada endpoint login, signup, post, dan comment

## Batas rate limit
- Login: maksimal 5 request per menit per IP
- Signup: maksimal 3 request per menit per IP
- Create post: maksimal 10 request per menit berdasarkan user dan IP
- Create comment: maksimal 20 request per menit berdasarkan user dan IP

## Referensi
- CAPTCHA package: https://github.com/Gregwar/Captcha
- Rate Limiting: https://laravel.com/docs/13.x/routing#rate-limiting
- Database Transactions: https://laravel.com/docs/13.x/database#database-transactions
- File Storage: https://laravel.com/docs/13.x/filesystem
- Session: https://laravel.com/docs/13.x/session

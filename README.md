# 10. Create dan Read
Menambahkan alur create dan read untuk post. User dapat mengirim post melalui form, data divalidasi lalu disimpan menggunakan Eloquent, kemudian diarahkan ke halaman detail post. View feed dan detail post diperbarui untuk membaca data model, sementara komponen form menangani old input dan pesan error validasi secara konsisten.

## File terkait
- `app/Http/Controllers/HomeController.php` - Mengambil 10 post terbaru dari database tanpa lagi menghentikan request dengan `dd`
- `app/Http/Controllers/PostController.php` - Memvalidasi dan menyimpan post baru, lalu redirect ke detail post
- `app/Models/User.php` - Menambahkan accessor `usernameDisplay` untuk menampilkan username dengan awalan `@`
- `resources/views/components/form/error.blade.php` - Menampilkan pesan error validasi berdasarkan nama field
- `resources/views/components/form/input.blade.php` - Input reusable dengan label, old input, dan error
- `resources/views/components/form/label.blade.php` - Label reusable untuk field form
- `resources/views/components/form/textarea.blade.php` - Textarea reusable dengan old input dan error
- `resources/views/components/post-card.blade.php` - Membaca data post, user, waktu, likes, dan comments dari object model
- `resources/views/components/post-comment.blade.php` - Membaca data komentar dan user terkait dari object model
- `resources/views/post/show.blade.php` - Menampilkan detail post, jumlah komentar, form komentar, dan daftar komentar dari model

## Referensi
- Eloquent: https://laravel.com/docs/13.x/eloquent
- Validation: https://laravel.com/docs/13.x/validation
- Old input: https://laravel.com/docs/13.x/requests#old-input
- Blade Components: https://laravel.com/docs/13.x/blade#components

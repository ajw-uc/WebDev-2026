# Sesi 7.A. Create dan Read
Menambahkan fitur buat post dan menampilkan post. Membuat komponen untuk inputan agar bisa menampilkan old input dan error validation.

## File terkait
- `app/Http/Controllers/HomeController.php` - Menampilkan 10 post terbaru
- `app/Http/Controllers/PostController.php` - Validasi dan simpan post
- `app/Models/User.php` - Menampilkan username dengan awalan @
- `resources/views/components/post-card.blade.php` - Menampilkan data dari object model
- `resources/views/components/post-comment.blade.php` - Menampilkan data dari object model
- `resources/views/components/form/error.blade.php` - Menampilkan error validation
- `resources/views/components/form/input.blade.php` - Input field dengan old input dan error validation
- `resources/views/components/form/label.blade.php` - Label field
- `resources/views/components/form/textarea.blade.php` - Textarea field dengan old input dan error validation
- `resources/views/post/show.blade.php` - Menampilkan data dari object model

## Referensi
- Eloquent: https://laravel.com/framework/docs/eloquent
- Validation: https://laravel.com/framework/docs/13.x/validation
- Old input: https://laravel.com/framework/docs/13.x/requests#old-input

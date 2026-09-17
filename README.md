# 13. Search dan Sort
Menambahkan pencarian dan pengurutan pada halaman daftar post. User dapat mencari post berdasarkan isi, nama, atau username author, lalu mengurutkan hasil berdasarkan post terbaru atau terlama. Parameter filter dipertahankan saat berpindah halaman melalui pagination.

## File terkait
- `app/Http/Controllers/PostController.php` - memproses query `search` dan `sort`, mencari pada content/name/username, mengurutkan hasil, serta mempertahankan query string pada pagination
- `public/css/style.css` - menambahkan styling search box, filter form, dan layout responsive untuk kontrol pencarian
- `resources/views/layout/default.blade.php` - menambahkan search form pada navbar yang mengarah ke daftar post
- `resources/views/post/index.blade.php` - menambahkan search input, pilihan sort terbaru/terlama, tombol Apply, dan jumlah hasil post

## Referensi
- Pagination: https://laravel.com/docs/13.x/pagination
- Query Builder: https://laravel.com/docs/queries
- Eloquent Relationships: https://laravel.com/docs/13.x/eloquent-relationships

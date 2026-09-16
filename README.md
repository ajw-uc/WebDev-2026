# 13. Update dan Delete
Menambahkan alur update dan delete untuk post, serta create dan delete untuk komentar. Form post dipisahkan menjadi view create/edit dan partial reusable, sementara halaman detail menyediakan tombol aksi dengan konfirmasi modal sebelum penghapusan.

## File terkait
- `app/Http/Controllers/PostController.php` - Memvalidasi dan menyimpan update post, menghapus post secara soft delete, serta membuat dan menghapus komentar
- `app/Http/Controllers/UserController.php` - Mengambil profil user dan post dari model Eloquent
- `public/css/style.css` - menambahkan style untuk aksi edit/delete, tombol komentar, dan modal konfirmasi
- `resources/views/components/form/input.blade.php` - Mengabaikan atribut `label` dari elemen input HTML
- `resources/views/components/form/textarea.blade.php` - Mengabaikan atribut `label` dari elemen textarea HTML
- `resources/views/components/post-card.blade.php` - Menampilkan waktu update jika post berubah
- `resources/views/components/post-comment.blade.php` - Menampilkan waktu update, tombol delete, dan modal konfirmasi komentar
- `resources/views/post/_form.blade.php` - Partial reusable untuk field content post
- `resources/views/post/create.blade.php` - Halaman create post menggunakan partial form
- `resources/views/post/edit.blade.php` - Halaman edit post menggunakan partial form dan method PUT
- `resources/views/post/show.blade.php` - Menambahkan tombol edit/delete post dan modal konfirmasi penghapusan
- `resources/views/user/show.blade.php` - Menampilkan data profil dari model serta jumlah followers/following
- `routes/web.php` - Menambahkan route DELETE untuk komentar dan mempertahankan route update/delete post

## Referensi
- Method Spoofing: https://laravel.com/docs/13.x/routing#form-method-spoofing
- Update: https://laravel.com/docs/13.x/eloquent#updates
- Delete: https://laravel.com/docs/13.x/eloquent#deleting-models
- Blade Includes: https://laravel.com/docs/13.x/blade#including-subviews

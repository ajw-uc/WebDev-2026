# Sesi 8.A. Update dan delete
Mengubah dan menghapus post. Menambahkan dan menghapus komentar. Fix tampilan user show. Fix jangan tampilkan label di komponen input.

## File terkait
- `app/Http/Controllers/PostController.php` - Fungsi update, destroy, storeComment, destroyComment
- `app/Http/Controllers/UserController.php` - Fungsi show ambil dari model
- `public/css/style.css` - Tambah style update dan delete
- `resources/views/components/form/input.blade.php` - Except label di inputan
- `resources/views/components/form/textarea.blade.php` - Except label di inputan
- `resources/views/components/post-card.blade.php` - Menampilkan tanggal updated_at jika diubah
- `resources/views/components/post-comment.blade.php` - Menampilkan tanggal updated_at, tombol delete, dan popup delete
- `resources/views/post/form.blade.php` - Hapus, pecah menjadi beberapa komponen supaya rapi
- `resources/views/post/_form.blade.php` - Isi inputan form post
- `resources/views/post/create.blade.php` - View halaman create post
- `resources/views/post/edit.blade.php` - View halaman edit post
- `resources/views/post/show.blade.php` - Tampilkan tombol edit dan delete
- `resources/views/user/show.blade.php` - Tampilkan jumlah follower dan following
- `routes/web.php` - Menambahkan route hapus comment

## Referensi
- Method Spoofing: https://laravel.com/framework/docs/13.x/routing#form-method-spoofing
- Update: https://laravel.com/framework/docs/13.x/routing#form-method-spoofing
- Delete: https://laravel.com/framework/docs/13.x/eloquent#deleting-models

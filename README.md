# 14. Update dan Delete
Menambahkan alur update dan delete untuk post, serta create dan delete untuk komentar. Form post dipisahkan menjadi view create/edit dan partial reusable, sementara halaman detail menyediakan tombol aksi dengan konfirmasi modal sebelum penghapusan.

## File terkait
- `app/Http/Controllers/PostController.php` - Memvalidasi dan menyimpan update post, menghapus post secara soft delete, serta membuat dan menghapus komentar
- `app/Http/Controllers/UserController.php` - Mengambil profil user dan post dari model Eloquent
- `public/css/style.css` - menambahkan style untuk aksi edit/delete, tombol komentar, dan modal konfirmasi
- `resources/views/components/form/input.blade.php` - Mengabaikan atribut `label` dari elemen input HTML
- `resources/views/components/form/textarea.blade.php` - Mengabaikan atribut `label` dari elemen textarea HTML
- `resources/views/components/post/card.blade.php` - Pindah component post-card ke post.card
- `resources/views/components/post/comment.blade.php` - Pindah component post-comment ke post.comment dan rapikan tampilan
- `resources/views/components/post/form.blade.php` - Komponen untuk menampilkan form post yang sudah bisa handle edit, create, dan hide label. Dilengkapi dengan default action dan scoped slot actions.
- `resources/views/home.blade.php` - Mengubah pemanggilan component post.card
- `resources/views/post/create.blade.php` - Menampilkan form post dari component
- `resources/views/post/edit.blade.php` - Menampilkan form post dari component
- `resources/views/post/show.blade.php` - Menambahkan tombol edit/delete post dan modal konfirmasi penghapusan, mengubah pemanggilan component post.card dan post.comment
- `resources/views/user/show.blade.php` - Menampilkan data profil dari model serta jumlah followers/following, mengubah pemanggilan component post.card
- `routes/web.php` - Menambahkan route DELETE untuk komentar dan mempertahankan route update/delete post

## Referensi
- Method Spoofing: https://laravel.com/docs/13.x/routing#form-method-spoofing
- Update: https://laravel.com/docs/13.x/eloquent#updates
- Delete: https://laravel.com/docs/13.x/eloquent#deleting-models
- Scoped Slots: https://laravel.com/framework/docs/13.x/blade#scoped-slots

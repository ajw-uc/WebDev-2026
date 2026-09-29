# 17. Authorization dengan Policy & Gate
Menambahkan authorization berbasis kepemilikan resource. Hanya user yang membuat post yang dapat mengedit atau menghapus post tersebut, dan hanya user yang membuat komentar yang dapat menghapus komentarnya. Pemeriksaan dilakukan di server melalui Policy dan Gate, sedangkan tombol serta modal aksi pada Blade hanya ditampilkan kepada user yang memiliki izin.

## Policy dan Gate
- **Policy** adalah class yang berisi aturan authorization untuk model tertentu. `PostPolicy` memeriksa apakah user adalah pemilik post untuk aksi `update` dan `delete`, sedangkan `CommentPolicy` memeriksa kepemilikan komentar untuk aksi `delete`.
- **Gate** adalah mekanisme Laravel untuk menjalankan pemeriksaan authorization. Pada project ini, Policy didaftarkan melalui `Gate::policy()`, dipanggil di controller dengan `Gate::authorize()`, dan digunakan di Blade dengan `@can` serta `@canany`.
- Pengecekan di Blade hanya mengatur tampilan UI. Pengecekan `Gate::authorize()` di controller tetap diperlukan agar request langsung ke endpoint tidak dapat melewati aturan kepemilikan.

## File terkait
- `app/Http/Controllers/PostController.php` - Membatasi update, delete post, serta delete komentar agar hanya dapat dilakukan oleh user pemilik
- `app/Policies/PostPolicy.php` - Memastikan hanya pemilik post yang dapat melakukan update dan delete
- `app/Policies/CommentPolicy.php` - Memastikan hanya pemilik komentar yang dapat melakukan delete
- `app/Providers/AppServiceProvider.php` - Mendaftarkan Policy secara eksplisit ke model melalui Gate
- `resources/views/components/post-card.blade.php` - Menampilkan tombol edit dan delete hanya kepada pemilik
- `resources/views/components/post-comment.blade.php` - Menyesuaikan tampilan komentar dan menampilkan tombol/modal delete hanya kepada pemilik komentar

## Referensi
- Authorization: https://laravel.com/docs/13.x/authorization
- Gates: https://laravel.com/docs/13.x/authorization#gates
- Policies: https://laravel.com/docs/13.x/authorization#creating-policies

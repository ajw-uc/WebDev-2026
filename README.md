# 17. Like dan Follow
Menambahkan interaksi like pada post dan fitur follow/unfollow antar user. Like dapat di-toggle secara asynchronous menggunakan JavaScript dan endpoint JSON, sedangkan network followers/following ditampilkan melalui halaman terpisah dengan pagination.

## File terkait
- `app/Http/Controllers/PostController.php` - menambahkan endpoint `toggleLike()` untuk membuat/menghapus like dan mengembalikan status serta jumlah like dalam JSON
- `app/Http/Controllers/UserController.php` - menambahkan daftar network, follow, unfollow, dan status following pada profil publik
- `public/js/like.js` - mengelola toggle like asynchronous, optimistic UI, update counter, dan rollback saat request gagal
- `public/css/style.css` - menambahkan styling tombol like, follow, network list, dan state interaktif
- `resources/views/components/post-card.blade.php` - menampilkan tombol like untuk user login dan memuat script like sekali
- `resources/views/components/post-comment.blade.php` - menampilkan kontrol delete sesuai authorization
- `resources/views/user/_network-person.blade.php` - partial untuk item user pada daftar network
- `resources/views/user/index_network.blade.php` - halaman followers/following user sendiri dengan tab dan pagination
- `resources/views/user/show_network.blade.php` - halaman network milik user publik
- `resources/views/user/index.blade.php` - menjadikan statistik followers/following sebagai link ke network
- `resources/views/user/show.blade.php` - menambahkan tombol Follow/Unfollow dan link network pada profil publik
- `resources/views/layout/default.blade.php` - memuat script tambahan melalui stack layout
- `routes/web.php` - menambahkan route like, follow, unfollow, dan halaman network

## Referensi
- HTTP JSON Responses: https://laravel.com/docs/13.x/responses#json-responses
- Eloquent Relationships: https://laravel.com/docs/13.x/eloquent-relationships
- Pagination: https://laravel.com/docs/13.x/pagination

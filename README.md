# Sesi 3.C. Bootstrap
Mengintegrasikan Bootstrap 5.3 ke dalam layout Blade untuk membuat tampilan Mini Social lebih terstruktur dan responsif. Perubahan ini juga menambahkan komponen form dan komentar, composer post di halaman home, serta tombol navigasi untuk mengedit profil dan membuat post.

## File terkait
- `public/css/style.css` - Menambahkan ukuran avatar kecil dan besar sebagai pelengkap Bootstrap
- `resources/views/components/form/group.blade.php` - Komponen pembungkus field form dengan spacing default `mb-3`
- `resources/views/components/post-card.blade.php` - Menyesuaikan card post dengan utility class Bootstrap
- `resources/views/components/post-comment.blade.php` - Komponen baru untuk menampilkan komentar dalam format yang konsisten
- `resources/views/layout/default.blade.php` - Memuat Bootstrap 5.3, menyediakan navbar, container, dan section `head`/`scripts`
- `resources/views/home.blade.php` - Menambahkan composer post dan menampilkan feed dalam Bootstrap card
- `resources/views/post/show.blade.php` - Menampilkan detail post dan komentar menggunakan `list-group` serta component komentar
- `resources/views/post/form.blade.php` - Mengubah form post menjadi Bootstrap card dan form control
- `resources/views/user/edit.blade.php` - Menambahkan halaman edit profil dengan field Bootstrap
- `resources/views/user/index.blade.php` - Menambahkan tombol Edit Profile dan Create Post

## Referensi
- Bootstrap: https://getbootstrap.com/docs/5.3/getting-started/introduction/
- Bootstrap components: https://getbootstrap.com/docs/5.3/components/

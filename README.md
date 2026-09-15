# Sesi 6. Relasi Eloquent, Custom Attribute, dan Collection
Menghubungkan model dengan relasi Eloquent dan memanfaatkan accessor untuk menyediakan format waktu yang mudah dibaca. Factory dan seeder diperluas untuk menghasilkan post beserta komentar, likes, dan relasi follow. Collection digunakan untuk memilih user secara acak, sedangkan `dd` ditambahkan pada alur pengambilan data untuk kebutuhan debugging.

## File terkait
- `app/Http/Controllers/HomeController.php` - Mengambil 10 post terbaru melalui Eloquent dan menjalankan `dd` untuk debugging
- `app/Http/Controllers/PostController.php` - Mengambil detail post dengan `findOrFail` dan menguji relasi serta custom attribute
- `app/Models/Comment.php` - Menambahkan relasi `user` dan accessor waktu dibuat, diubah, serta dihapus
- `app/Models/Post.php` - Menambahkan relasi `user`, `comments`, dan `likes`, serta accessor waktu
- `app/Models/User.php` - Menambahkan relasi `posts`, `followers`, dan `following`
- `database/factories/PostFactory.php` - Menambahkan state `withComments()` dan `withLikes()` untuk membuat data terkait setelah post dibuat
- `database/seeders/DemoSeeder.php` - Membuat 20 user, 100 post, komentar, likes, dan relasi follow acak

## Referensi
- Eloquent Relationship: https://laravel.com/docs/13.x/eloquent-relationships
- Eloquent Mutators and Accessors: https://laravel.com/docs/13.x/eloquent-mutators
- Collections: https://laravel.com/docs/13.x/collections
- Helper `dd`: https://laravel.com/docs/13.x/helpers#method-dd
- Factory States: https://laravel.com/docs/13.x/eloquent-factories#factory-states

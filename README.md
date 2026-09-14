# Sesi 6. Relasi Eloquent, Custom Attribute, dan Collection
Pada sesi ini ada beberapa hal yang dilakukan:
1. Modifikasi PostFactory agar bisa menambahkan dummy comment dan likes
2. Menambahkan custom attribute di Model
3. Membuat dummy follow
4. Memanfaatkan fungsi collection
5. Menampilkan data dengan dumper `dd` untuk debugging

## File terkait
- `app/Http/Controllers/HomeController.php` - Menampilkan 10 post terbaru
- `app/Http/Controllers/PostController.php` - Menampilkan detail post
- `app/Models/Comment.php` - Menambahkan relasi ke user dan attribute untuk konversi format waktu
- `app/Models/Post.php` - Menambahkan relasi ke comment, like, dan user, juga menambahkan attribute untuk konversi format waktu
- `app/Models/User.php` - Menambahkan relasi ke post dan fungsi untuk follow dan unfollow
- `database/factories/PostFactory.php` - Menambahka state withComments dan withLikes
- `database/seeders/DemoSeeder.php` - Menambahkan kode untuk generate comment, like, dan follow

## Referensi
- Eloquent Relationship: https://laravel.com/framework/docs/eloquent-relationships
- Helper DD: https://laravel.com/framework/docs/helpers#method-dd
- Append Attributes: https://laravel.com/framework/docs/13.x/eloquent-serialization#appending-values-to-json
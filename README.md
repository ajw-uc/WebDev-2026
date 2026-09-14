# Sesi 5. Model
Membuat model sesuai dengan database yang telah dibuat. Menambahkan, mengubah, menghapus, dan menampilkan data lewat Laravel Tinker REPL (read, eval, print, loop). Menggunakan factory dan faker untuk membuat data dummy secara otomatis dan membuat seeder untuk mempersiapkan demo data.

## Membuat Model
```bash
php artisan make:model Post
php artisan make:model Comment
php artisan make:model Like
php artisan make:model Follow
```
Setelah membuat model, atur variable `$fillable` untuk menentukan kolom apa saja yang boleh diisi secara massal.

## Membuka Tinker
Jalankan perintah berikut di terminal:
```bash
php artisan tinker
```

## Menambahkan data
Jalankan perintah berikut di Tinker:
```
User::create([
    'name' => 'John Doe',
    'email' => 'john.doe@example.com',
    'username' => 'johndoe',
    'password' => 'password',
]);
```

## Mendapatkan semua data
Jalankan perintah berikut di Tinker:
```
User::all();
```

## Mendapatkan data berdasarkan ID
Jalankan perintah berikut di Tinker:
```
User::find(1);
```

## Mendapatkan data berdasarkan username
Jalankan perintah berikut di Tinker:
```
User::where('username', 'johndoe')->first();
```

## Mengubah data
Jalankan perintah berikut di Tinker:
```
$user = User::find(1);
$user->name = 'Jane Doe';
$user->save();
```

## Menghapus data
Jalankan perintah berikut di Tinker:
```
$user->delete();
```

## Membuat factory
Jalankan perintah berikut di terminal:
```
php artisan make:factory PostFactory
```

## Menjalankan factory
Jalankan perintah berikut di Tinker:
```
\App\Models\User::factory()->count(5)->create();
\App\Models\Post::factory()->count(100)->create();
```

## Membuat seeder
Jalankan perintah berikut di terminal:
```
php artisan make:seeder DemoSeeder
```

## Menjalankan seeder
Jalankan perintah berikut di terminal:
```
php artisan db:seed --class=DemoSeeder
php artisan db:seed
```

## Rollback dan seed
```
php artisan migration:rollback --seed
```


## File terkait
- `app/Models/Comment.php` - Model yang terhubung dengan table comment
- `app/Models/Follow.php` - Model yang terhubung dengan table follow
- `app/Models/Like.php` - Model yang terhubung dengan table like
- `app/Models/Post.php` - Model yang terhubung dengan table post
- `app/Models/User.php` - Model yang terhubung dengan table user
- `database/factories/UserFactory.php` - Factory untuk membuat user
- `database/factories/PostFactory.php` - Factory untuk membuat post
- `database/seeders/DemoSeeder.php` - Seeder untuk demo program
- `database/seeders/DatabaseSeeder.php` - Seeder 

## Referensi
- Migrations: https://laravel.com/framework/docs/migrations
- Eloquent Model: https://laravel.com/framework/docs/13.x/eloquent
- Tinker: https://laravel.com/framework/docs/13.x/artisan#tinker
- Factory: https://laravel.com/framework/docs/13.x/eloquent-factories
- Faker: https://fakerphp.org/
- Seeding: https://laravel.com/framework/docs/13.x/seeding#writing-seeders
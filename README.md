# Sesi 5. Model
Membuat Eloquent model sesuai dengan tabel database pada sesi sebelumnya. Model dikonfigurasi dengan mass assignment, soft delete, factory, dan casting password. Data dapat diuji melalui Laravel Tinker, sedangkan factory dan seeder digunakan untuk menghasilkan data demo user dan post secara otomatis.

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
php artisan migrate:rollback --seed
```


## File terkait
- `app/Models/Comment.php` - Model comment dengan atribut fillable dan soft delete
- `app/Models/Follow.php` - Model relasi follower dan following dengan atribut fillable
- `app/Models/Like.php` - Model like dengan atribut fillable
- `app/Models/Post.php` - Model post dengan atribut fillable, factory, dan soft delete
- `app/Models/User.php` - Model user dengan atribut fillable, hidden, factory, dan casting password
- `database/factories/UserFactory.php` - Factory user dengan data Faker dan password default
- `database/factories/PostFactory.php` - Factory post dengan user acak dan isi paragraph Faker
- `database/seeders/DemoSeeder.php` - Membuat 5 user dan 100 post untuk data demo
- `database/seeders/DatabaseSeeder.php` - Memanggil `DemoSeeder` sebagai seeder utama

## Referensi
- Migrations: https://laravel.com/docs/13.x/migrations
- Eloquent Model: https://laravel.com/docs/13.x/eloquent
- Tinker: https://laravel.com/docs/13.x/artisan#tinker
- Factory: https://laravel.com/docs/13.x/eloquent-factories
- Faker: https://fakerphp.org/
- Seeding: https://laravel.com/docs/13.x/seeding#writing-seeders

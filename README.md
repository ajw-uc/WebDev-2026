# Sesi 24. API
Menambahkan REST API versi `v1` untuk fitur post, komentar, dan like menggunakan Laravel Sanctum sebagai autentikasi token. Response API dinormalisasi dengan Laravel API Resource, dilengkapi pagination dan Postman collection untuk pengujian endpoint.

## API Resource

API Resource adalah layer transformasi yang mengubah model Eloquent menjadi struktur JSON yang konsisten sebelum dikirim sebagai response API. Resource menentukan field yang ditampilkan serta relasi dan jumlah relasi yang sudah di-load.

- `UserResource` - data dasar user
- `PostResource` - data post, user, dan jumlah komentar/like
- `CommentResource` - data komentar dan user pembuatnya

## Package untuk autentikasi API

API menggunakan Laravel Sanctum untuk sistem autentikasi API dengan personal access token:
```bash
php artisan install:api
```

## Autentikasi API

Buat token melalui halaman **My Profile → API Tokens**, lalu gunakan sebagai Bearer Token:

```http
Authorization: Bearer {sanctum_token}
Accept: application/json
```

Endpoint protected juga membutuhkan user yang sudah memverifikasi email.

## Endpoint API v1

Base URL: `/api/v1`

- `GET /posts` - daftar post dengan pagination
- `GET /posts/{post}` - detail post beserta komentar
- `GET /posts/{post}/comments` - daftar komentar
- `POST /posts` - membuat post
- `PUT /posts/{post}` - mengubah post
- `POST /posts/{post}/comments` - membuat komentar
- `DELETE /posts/{post}/comments/{comment}` - menghapus komentar
- `POST /posts/{post}/like` - toggle like
- `DELETE /posts/{post}` - menghapus post

## File terkait

- `app/Http/Controllers/Api/V1/PostController.php` - controller endpoint API post, komentar, dan like
- `app/Http/Controllers/ApiTokenController.php` - membuat dan mencabut personal access token
- `app/Http/Resources/UserResource.php` - format response user
- `app/Http/Resources/PostResource.php` - format response post dan metadata relasi
- `app/Http/Resources/CommentResource.php` - format response komentar
- `routes/api.php` - endpoint API v1 dan middleware `auth:sanctum`/`verified`
- `config/sanctum.php` - konfigurasi Sanctum
- `resources/views/user/api-tokens.blade.php` - halaman pengelolaan token API
- `API-postman-collection.json` - collection request public dan protected

## Postman Collection

Import file `API-postman-collection.json` ke Postman untuk mencoba endpoint API tanpa membuat request dari awal. Collection sudah memiliki dua kelompok request:

- **Public posts** - list post, detail post, dan komentar tanpa token.
- **Protected posts** - create/update/delete post, komentar, dan toggle like menggunakan Bearer Token.

Atur variable collection berikut sebelum menjalankan request protected:

- `base_url` - URL aplikasi, contoh `http://localhost:8000`
- `sanctum_token` - personal access token dari halaman API Tokens
- `post_id` dan `comment_id` - ID data yang ingin diuji

Token akan dikirim otomatis sebagai `Authorization: Bearer {{sanctum_token}}`. Pastikan user pemilik token sudah terverifikasi email dan queue tidak diperlukan untuk menjalankan endpoint API.

## Referensi
- API Resources: https://laravel.com/docs/13.x/eloquent-resources
- Sanctum: https://laravel.com/docs/13.x/sanctum
- API Routing: https://laravel.com/docs/13.x/routing
- Postman Collections: https://learning.postman.com/docs/collections/collections-overview/

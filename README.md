# 15. Upload File
Menambahkan dukungan upload gambar pada post. File divalidasi berdasarkan tipe dan ukuran, disimpan pada disk `public`, ditampilkan sebagai thumbnail dengan modal preview, serta dapat diganti atau dihapus saat post diedit.

## File terkait
- `app/Http/Controllers/PostController.php` - Memvalidasi, menyimpan, mengganti, dan menghapus file gambar post menggunakan `Storage`
- `public/css/style.css` - Menambahkan styling thumbnail, preview image, dan kontrol upload
- `resources/views/components/post/card.blade.php` - Menampilkan thumbnail gambar post dan modal preview berukuran besar
- `resources/views/components/post/form.blade.php` - Menambahkan `enctype="multipart/form-data"` pada form. Menyediakan input gambar, batasan format/ukuran, preview gambar lama, dan opsi hapus gambar

## Referensi
- File Uploads: https://laravel.com/docs/13.x/filesystem#file-uploads
- File Storage: https://laravel.com/docs/13.x/filesystem#the-public-disk
- File Deletion: https://laravel.com/docs/13.x/filesystem#file-deletion
- Validation: https://laravel.com/docs/13.x/validation

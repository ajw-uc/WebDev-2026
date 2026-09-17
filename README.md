# 1. Instalasi Laravel
Sesi ini mempelajari cara instalasi Laravel dan melakukan push ke GitHub

## Cara instalasi dengan Herd
1. Install Herd (https://herd.laravel.com/)
2. Buka Herd
3. Buka Sites
4. Klik "+ Add Site"
5. Pilih "New Laravel Project"
6. Untuk starter kit, pilih "No Starter Kit"
7. Isi nama project, misalkan "Webdev"
8. Pilih project path (lokasi penyimpanan project)
9. Pilih testing framework "Pest"
10. Aktifkan Laravel Boost jika akan menggunakan AI Agent untuk membantu coding
11. Aktifkan Initialize a Git repository
12. Klik "Next", tunggu hingga proses instalasi selesai
13. Setelah project berhasil dibuat, Herd akan mengaktifkan URL http://webdev.test

## Cara instalasi manual
1. Pastikan komputer sudah terinstall PHP, pastikan versi PHP 8.3 atau lebih tinggi dengan menjalankan perintah `php -v` di terminal.
2. Install Composer, ikuti panduan https://getcomposer.org/doc/00-intro.md
3. Buka terminal, lalu masuk ke direktori dimana project akan disimpan
4. Jalankan perintah Composer untuk mengunduh project Laravel:
```
composer create-project laravel/laravel webdev
```
5. Masuk ke project yang baru dibuat
```
cd webdev
```
6. Pastikan file konfigurasi .env sudah tersedia, jika belum salin file konfigurasi dan generate key
```
cp .env.example .env
php artisan key:generate
```
7. Jalankan server Laravel
```
php artisan serve
```
8. Buka browser dan akses URL http://127.0.0.1:8000 atau localhost:8000

## Membuat repository GitHub
1. Buka GitHub (https://github.com)
2. Sign up, jika belum memiliki akun
3. Masuk ke GitHub
4. Buat repository baru, klik tombol "+" di kanan atas, lalu pilih "New repository"
5. Masukkan nama repository, misalkan "webdev"
6. Pastikan visibility yang dipilih adalah "public"
7. Klik "Create Repository"

## Instalasi Git
1. Buka terminal di komputer
2. Jalankan perintah:
```bash
git --version
```
Jika Git belum terinstal, install Git terlebih dahulu dengan mengikuti panduan di https://git-scm.com/book/en/v2/Getting-Started-Installing-Git.

## Menyimpan source code ke GitHub
1. Buka halaman repository GitHub, lalu copy URL repository, contoh: https://github.com/ajw-uc/webdev.git
2. Buka terminal di komputer
3. Pindah ke direktori project dengan perintah `cd`, contoh: 
```bash
cd /Users/user/Herd/WebDev
```
4. Hubungkan project dengan repository GitHub 
```bash
git remote add origin <URL Repository>
```
5. Buat branch bernama "main" 
```bash
git branch -M main
```
6. Tambahkan semua file ke staging area 
```bash
git add .
```
7. Commit semua file dengan perintah 
```
git commit -m "Initial commit"
```
8. Push semua file ke repository GitHub dengan perintah 
```
git push -u origin main
```
9. Lihat repository GitHub, source code sekarang sudah tersimpan di GitHub

## Referensi
- Herd: https://herd.laravel.com/
- Git: https://git-scm.com/book/en/v2/Getting-Started-Installing-Git
- Laravel Installation: https://laravel.com/framework/docs/13.x/installation
- Laravel Boost: https://laravel.com/framework/docs/boost

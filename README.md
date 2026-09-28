# Perpustakaan (PHP sederhana)

## Struktur folder
```
perpus-php/
├── index.php          -> pintu masuk, langsung ke halaman buku
├── schema.sql         -> struktur database (import lewat phpMyAdmin)
├── run.bat            -> menjalankan website di komputer lokal
├── assets/style.css   -> tampilan
├── includes/          -> potongan yang dipakai banyak halaman
│   ├── init.php       -> session, koneksi database, fungsi bantu
│   ├── header.php     -> bagian atas halaman + menu
│   └── footer.php     -> bagian bawah halaman
├── auth/              -> login.php, logout.php
├── buku/              -> CRUD buku
│   └── index.php (Read), tambah.php (Create), edit.php (Update), hapus.php (Delete)
└── users/             -> CRUD pengguna (nama file sama dengan folder buku)
```

## Hak akses (3 role)
| Role | Lihat buku | Tambah/ubah/hapus buku | Kelola pengguna |
|---|---|---|---|
| user | ya | tidak | tidak |
| staf | ya | ya | tidak |
| operator | ya | ya | ya |

## Cara menjalankan
1. Jalankan MySQL dari XAMPP, lalu import `schema.sql` di phpMyAdmin.
2. Jalankan `run.bat` (perlu `php` di PATH, di XAMPP: `C:\xampp\php`).
   Jika dipasang di `htdocs/perpus`, ubah `BASE` di `includes/init.php` menjadi `'/perpus/'`.
3. Login: `operator` / `operator123` (segera ganti).

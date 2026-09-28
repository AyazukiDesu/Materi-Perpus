CREATE DATABASE IF NOT EXISTS perpustakaan_db; -- buat database jika belum ada
USE perpustakaan_db; -- pakai database tersebut

CREATE TABLE users ( -- tabel pengguna
    id INT AUTO_INCREMENT PRIMARY KEY, -- nomor unik, naik otomatis
    username VARCHAR(50) NOT NULL UNIQUE, -- nama login, tidak boleh kembar
    password VARCHAR(255) NOT NULL, -- password disimpan apa adanya (teks biasa)
    nama_lengkap VARCHAR(150) NOT NULL, -- nama asli pengguna
    role ENUM('user', 'staf', 'operator') NOT NULL DEFAULT 'user' -- 3 role yang tersedia
);

CREATE TABLE buku ( -- tabel buku
    id INT AUTO_INCREMENT PRIMARY KEY, -- nomor unik, naik otomatis
    judul VARCHAR(255) NOT NULL, -- judul buku
    penulis VARCHAR(150) NOT NULL, -- nama penulis
    tahun_terbit INT NOT NULL, -- tahun terbit
    stok INT NOT NULL -- jumlah buku yang tersedia
);

-- akun operator pertama: username "operator", password "operator123" (segera ganti)
INSERT INTO users (username, password, nama_lengkap, role) VALUES
('operator', 'operator123', 'Operator', 'operator');

<?php
session_start(); // mulai session supaya data login tersimpan antar halaman
define('BASE', '/'); // alamat dasar website (ganti '/perpus/' jika ditaruh di htdocs/perpus)
$koneksi = mysqli_connect("localhost", "root", "", "perpustakaan_db"); // sambung ke MySQL (host, user, password, nama database)

function cek_role(...$boleh) { // cek login dan role, contoh: cek_role('staf', 'operator')
    if (!isset($_SESSION['user'])) { // jika belum login
        header("Location: " . BASE . "auth/login.php"); // arahkan ke halaman login
        exit; // hentikan program
    }
    if ($boleh && !in_array($_SESSION['user']['role'], $boleh)) { // jika role user tidak ada di daftar yang diizinkan
        die("Akses ditolak."); // tampilkan pesan lalu berhenti
    }
}

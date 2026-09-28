<?php
require '../includes/init.php'; // muat session dan koneksi database
cek_role('operator'); // hanya operator yang boleh
$id = $_GET['id']; // ambil id dari URL (?id=5)
mysqli_query($koneksi, "DELETE FROM users WHERE id=$id"); // DELETE: hapus pengguna dengan id tersebut
header("Location: index.php"); // kembali ke daftar pengguna
exit; // hentikan program

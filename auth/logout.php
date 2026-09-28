<?php
require '../includes/init.php'; // muat session dan fungsi bantu
session_destroy(); // hapus semua data session (artinya logout)
header("Location: login.php"); // kembali ke halaman login
exit; // hentikan program

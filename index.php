<?php
require 'includes/init.php'; // muat session, database, dan fungsi bantu
header("Location: " . BASE . "buku/index.php"); // langsung pindah ke halaman buku (jika belum login, akan diminta login)

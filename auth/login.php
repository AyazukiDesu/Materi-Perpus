<?php
require '../includes/init.php'; // muat session dan koneksi database
$error = ""; // tempat pesan error (kosong = tidak ada error)
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // jika form login dikirim
    $username = $_POST['username']; // ambil username dari form
    $password = $_POST['password']; // ambil password dari form
    $hasil = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'"); // cari user yang username dan password-nya cocok
    $user = mysqli_fetch_assoc($hasil); // ambil satu baris hasil (kosong jika tidak ada)
    if ($user) { // jika user ditemukan
        $_SESSION['user'] = ['id' => $user['id'], 'nama' => $user['nama_lengkap'], 'role' => $user['role']]; // simpan data login ke session
        header("Location: " . BASE . "buku/index.php"); // pindah ke halaman buku
        exit; // hentikan program
    }
    $error = "Username atau password salah."; // login gagal
}
include '../includes/header.php'; // tampilkan bagian atas halaman
?>
<div class="login"> <!-- kotak login di tengah halaman -->
<h1>Login</h1> <!-- judul halaman -->
<?php if ($error): // tampilkan error hanya jika ada ?>
    <p class="error"><?= $error ?></p>
<?php endif; ?>
<form method="post"> <!-- form dikirim dengan metode POST -->
    <input name="username" placeholder="Username" required><br> <!-- kolom username -->
    <input name="password" type="password" placeholder="Password" required><br> <!-- kolom password (huruf disamarkan) -->
    <button>Masuk</button> <!-- tombol kirim -->
</form>
</div>
<?php include '../includes/footer.php'; ?>

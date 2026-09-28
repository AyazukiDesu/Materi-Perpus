<?php
require '../includes/init.php'; // muat session dan koneksi database
cek_role('operator'); // hanya operator yang boleh
$daftar = mysqli_query($koneksi, "SELECT * FROM users ORDER BY role, nama_lengkap"); // READ: ambil semua pengguna
include '../includes/header.php'; // tampilkan bagian atas halaman
?>
<h1>Daftar Pengguna</h1> <!-- judul halaman -->
<a class="tombol" href="tambah.php">+ Tambah Pengguna</a> <!-- tautan ke form tambah -->
<table>
    <tr><th>Username</th><th>Nama</th><th>Role</th><th>Aksi</th></tr> <!-- baris judul kolom -->
    <?php while ($u = mysqli_fetch_assoc($daftar)): // ulangi selama masih ada baris pengguna ?>
    <tr>
        <td><?= $u['username'] ?></td> <!-- username -->
        <td><?= $u['nama_lengkap'] ?></td> <!-- nama lengkap -->
        <td><?= $u['role'] ?></td> <!-- role -->
        <td>
            <a class="tombol" href="edit.php?id=<?= $u['id'] ?>">Edit</a> <!-- ke halaman edit -->
            <?php if ($u['id'] != $_SESSION['user']['id']): // akun sendiri tidak boleh dihapus ?>
            <a class="tombol merah" href="hapus.php?id=<?= $u['id'] ?>" onclick="return confirm('Hapus pengguna ini?')">Hapus</a> <!-- ke halaman hapus, minta konfirmasi dulu -->
            <?php endif; ?>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
<?php include '../includes/footer.php'; ?>

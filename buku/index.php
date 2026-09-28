<?php
require '../includes/init.php'; // muat session dan koneksi database
cek_role(); // semua role yang sudah login boleh melihat
$role = $_SESSION['user']['role']; // ambil role user yang sedang login
$daftar = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY judul"); // READ: ambil semua buku
include '../includes/header.php'; // tampilkan bagian atas halaman
?>
<h1>Daftar Buku</h1> <!-- judul halaman -->
<?php if ($role != 'user'): // tombol tambah hanya untuk staf dan operator ?>
    <a class="tombol" href="tambah.php">+ Tambah Buku</a>
<?php endif; ?>
<table>
    <tr> <!-- baris judul kolom -->
        <th>Judul</th><th>Penulis</th><th>Tahun</th><th>Stok</th>
        <?php if ($role != 'user'): // kolom aksi hanya untuk staf dan operator ?><th>Aksi</th><?php endif; ?>
    </tr>
    <?php while ($b = mysqli_fetch_assoc($daftar)): // ulangi selama masih ada baris buku ?>
    <tr>
        <td><?= $b['judul'] ?></td> <!-- judul buku -->
        <td><?= $b['penulis'] ?></td> <!-- penulis -->
        <td><?= $b['tahun_terbit'] ?></td> <!-- tahun terbit -->
        <td><?= $b['stok'] ?></td> <!-- stok -->
        <?php if ($role != 'user'): // tombol edit dan hapus hanya untuk staf dan operator ?>
        <td>
            <a class="tombol" href="edit.php?id=<?= $b['id'] ?>">Edit</a> <!-- ke halaman edit, id dikirim lewat URL -->
            <a class="tombol merah" href="hapus.php?id=<?= $b['id'] ?>" onclick="return confirm('Hapus buku ini?')">Hapus</a> <!-- ke halaman hapus, minta konfirmasi dulu -->
        </td>
        <?php endif; ?>
    </tr>
    <?php endwhile; ?>
</table>
<?php include '../includes/footer.php'; ?>

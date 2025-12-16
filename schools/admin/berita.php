<?php
session_start();
include '../config/koneksi.php';
// Cek Login (Copy dari index.php admin)
if (!isset($_SESSION['status_login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="index.php">Kembali ke Dashboard</a>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h4>Data Berita</h4>
                <a href="tambah_berita.php" class="btn btn-light btn-sm">Tambah Berita</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $tampil = mysqli_query($conn, "SELECT * FROM tb_artikel ORDER BY id DESC");
                        while($data = mysqli_fetch_array($tampil)):
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['judul']; ?></td>
                            <td><?= $data['tanggal_terbit']; ?></td>
                            <td>
                                <a href="edit_berita.php?id=<?= $data['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="hapus_berita.php?id=<?= $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
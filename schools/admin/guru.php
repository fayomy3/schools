<?php
session_start();
include '../config/koneksi.php';
if (!isset($_SESSION['status_login'])) { header("Location: login.php"); exit; }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <h3>Data Guru Pengajar</h3>
            <a href="tambah_guru.php" class="btn btn-primary">Tambah Guru</a>
        </div>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama Lengkap</th>
                    <th>NIP</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $tampil = mysqli_query($conn, "SELECT * FROM tb_guru ORDER BY id DESC");
                while($data = mysqli_fetch_array($tampil)):
                ?>
                <tr>
                    <td>
                        <img src="../assets/uploads/<?= $data['foto']; ?>" width="50" style="border-radius:50%">
                    </td>
                    <td><?= $data['nama_lengkap']; ?></td>
                    <td><?= $data['nip']; ?></td>
                    <td><?= $data['jabatan']; ?></td>
                    <td>
                        <a href="hapus_guru.php?id=<?= $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
    </div>
</body>
</html>
<?php
session_start();
// Cek apakah user sudah login atau belum?
if (!isset($_SESSION['status_login'])) {
    echo "<script>alert('Anda belum login!'); location='login.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Dashboard Admin</a>
            <div class="d-flex">
                <span class="navbar-text me-3">Halo, <?php echo $_SESSION['nama_admin']; ?></span>
                <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h3>Berita</h3>
                        <p>Kelola artikel sekolah</p>
                        <a href="berita.php" class="btn btn-light btn-sm">Lihat Data</a>
                    </div>
                </div>
            </div>
            </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h3>Guru</h3>
                        <p>Kelola data guru</p>
                        <a href="guru.php" class="btn btn-light btn-sm">Lihat Data</a>
                    </div>
                </div>
            </div>
            </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h3>Galeri</h3>
                        <p>Kelola data Galeri</p>
                        <a href="galeri.php" class="btn btn-light btn-sm">Lihat Data</a>
                    </div>
                </div>
            </div>
            </div>
    </div>

</body>
</html>
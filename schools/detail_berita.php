<?php 
include 'config/koneksi.php'; 
include 'layout/header.php'; 

$slug = $_GET['slug'];
$query = mysqli_query($conn, "SELECT * FROM tb_artikel WHERE slug='$slug'");
$data = mysqli_fetch_array($query);
?>

<div class="container mt-5 pt-5">
    <?php if($data): ?>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="fw-bold mb-3"><?= $data['judul']; ?></h1>
                <p class="text-muted">Diposting oleh: <?= $data['nama_lengkap']; ?> pada: <?= $data['tanggal_terbit']; ?></p>
                
                <img src="assets/uploads/<?= $data['gambar_sampul']; ?>" class="img-fluid rounded mb-4 w-100">
                
                <div class="content fs-5">
                    <?= nl2br($data['isi_konten']); ?>
                </div>
                
                <a href="berita.php" class="btn btn-secondary mt-5">Kembali ke Berita</a>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-danger">Berita tidak ditemukan!</div>
    <?php endif; ?>
</div>

<?php include 'layout/footer.php'; ?>
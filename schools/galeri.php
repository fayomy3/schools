<?php 
include 'layout/header.php'; 
include 'config/koneksi.php'; 
?>

<div class="container mt-5 pt-5">
    <div class="text-center mb-5">
        <h2>Galeri Kegiatan Sekolah</h2>
        <p class="text-muted">Dokumentasi aktivitas siswa dan guru SMK Hebat.</p>
    </div>

    <div class="row">
        <?php
        // Mengambil data dari tb_galeri
        $query = mysqli_query($conn, "SELECT * FROM tb_galeri ORDER BY id DESC");
        
        if(mysqli_num_rows($query) == 0){
            echo "<div class='col-12 text-center alert alert-warning'>Belum ada foto kegiatan yang diupload.</div>";
        }

        while($foto = mysqli_fetch_array($query)){
        ?>
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm h-100">
                <img src="assets/uploads/<?= $foto['file_media']; ?>" class="card-img-top" style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h6 class="card-title text-center"><?= $foto['judul_kegiatan']; ?></h6>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<?php include 'layout/footer.php'; ?>
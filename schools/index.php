<?php 
include 'config/koneksi.php'; // Sambung ke DB
include 'layout/header.php';  // Pasang Atap
?>

<div class="p-5 mb-4 bg-light rounded-3 text-center">
    <div class="container-fluid py-5">
      <h1 class="display-5 fw-bold">Selamat Datang di SMK Hebat</h1>
      <p class="col-md-8 fs-4 mx-auto">Mewujudkan generasi cerdas, berkarakter, dan siap kerja di era global.</p>
      <a href="profil.php" class="btn btn-primary btn-lg" type="button">Tentang Kami</a>
    </div>
</div>

<div class="container">
    <h3 class="border-bottom pb-2 mb-4">Berita Terbaru</h3>
    <div class="row">
        
        <?php
        // Query ambil 3 berita terbaru (Pastikan tabel posts sudah diisi dummy data 1 biji)
        $query = mysqli_query($conn, "SELECT * FROM tb_artikel ORDER BY id DESC LIMIT 3");
        
        // Cek jika data kosong
        if(mysqli_num_rows($query) == 0){
            echo "<div class='alert alert-warning'>Belum ada berita.</div>";
        }

        // Looping Data
        while($data = mysqli_fetch_array($query)){
        ?>

        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <img src="assets/uploads/<?php echo $data['gambar_sampul']; ?>" class="card-img-top" style="height: 200px; object-fit: cover;" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $data['judul']; ?></h5>
                    <p class="card-text"><?php echo substr($data['isi_konten'], 0, 100); ?>...</p>
                    <a href="detail_berita.php?slug=<?= $data['slug']; ?>" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
                </div>
            </div>
        </div>

        <?php } ?>

    </div>
</div>

<?php include 'layout/footer.php'; // Pasang Kaki ?>
<?php include 'layout/header.php'; include 'config/koneksi.php'; ?>

<div class="container mt-5 pt-4">
    <h2 class="mb-4">Arsip Berita Sekolah</h2>
    <div class="row">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM tb_artikel ORDER BY id DESC");
        while($data = mysqli_fetch_array($query)){
        ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="assets/uploads/<?= $data['gambar_sampul']; ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5><?= $data['judul']; ?></h5>
                    <p class="small text-muted"><?= date('d M Y', strtotime($data['tanggal_terbit'])); ?></p>
                    <p><?= substr($data['isi_konten'], 0, 100); ?>...</p>
                    <a href="detail_berita.php?slug=<?= $data['slug']; ?>" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<?php include 'layout/footer.php'; ?>
<?php 
include 'config/koneksi.php'; 
include 'layout/header.php'; 
?>

<div class="container mt-5 pt-5">
    <h2 class="text-center mb-4">Daftar Guru Pengajar</h2>
    
    <div class="row">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM tb_guru ORDER BY urutan_tampil ASC");
        
        // Jika data kosong
        if(mysqli_num_rows($query) == 0){
            echo "<div class='alert alert-info text-center'>Data guru belum diinput oleh Admin.</div>";
        }

        while($guru = mysqli_fetch_array($query)){
        ?>
        <div class="col-md-3 mb-4">
            <div class="card text-center shadow-sm">
                <img src="assets/uploads/<?= $guru['foto'] ? $guru['foto'] : 'default-user.png'; ?>" class="card-img-top p-3 rounded-circle" alt="Foto Guru">
                <div class="card-body">
                    <h5 class="card-title"><?= $guru['nama_lengkap']; ?></h5>
                    <p class="card-text text-muted"><?= $guru['jabatan']; ?></p>
                    <span class="badge bg-primary"><?= $guru['nip']; ?></span>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<?php include 'layout/footer.php'; ?>
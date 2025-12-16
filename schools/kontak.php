<?php 
include 'config/koneksi.php'; 
include 'layout/header.php'; 

if(isset($_POST['kirim'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    $simpan = mysqli_query($conn, "INSERT INTO tb_pesan (nama_pengirim, email_pengirim, isi_pesan) VALUES ('$nama', '$email', '$pesan')");

    if($simpan){
        echo "<script>alert('Pesan terkirim! Terima kasih.');</script>";
    }
}
?>

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4>Hubungi Kami</h4>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Pesan Anda</label>
                            <textarea name="pesan" class="form-control" rows="5" required></textarea>
                        </div>
                        <button type="submit" name="kirim" class="btn btn-success w-100">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>
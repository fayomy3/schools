<?php
session_start();
include '../config/koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];
$ambil = mysqli_query($conn, "SELECT * FROM tb_artikel WHERE id='$id'");
$data = mysqli_fetch_array($ambil);

if(isset($_POST['update'])){
    $judul = $_POST['judul'];
    $slug = strtolower(str_replace(' ', '-', $judul));
    $isi = $_POST['isi'];
    
    $file_foto = $_FILES['gambar']['name'];
    $lokasi_foto = $_FILES['gambar']['tmp_name'];

    // Jika foto diubah
    if (!empty($lokasi_foto)) {
        move_uploaded_file($lokasi_foto, "../assets/uploads/$file_foto");
        
        // Query Update dengan foto
        $query = "UPDATE tb_artikel SET judul='$judul', slug='$slug', isi_konten='$isi', gambar_sampul='$file_foto' WHERE id='$id'";
    } else {
        // Query Update tanpa ganti foto
        $query = "UPDATE tb_artikel SET judul='$judul', slug='$slug', isi_konten='$isi' WHERE id='$id'";
    }

    $update = mysqli_query($conn, $query);
    if($update){
        echo "<script>alert('Data berhasil diubah'); location='berita.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Edit Berita</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <h3>Edit Berita</h3>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="<?= $data['judul']; ?>">
        </div>
        <div class="mb-3">
            <label>Isi</label>
            <textarea name="isi" class="form-control" rows="5"><?= $data['isi_konten']; ?></textarea>
        </div>
        <div class="mb-3">
            <label>Ganti Gambar (Kosongkan jika tidak ingin mengganti)</label><br>
            <img src="../assets/uploads/<?= $data['gambar_sampul']; ?>" width="100" class="mb-2">
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="berita.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>
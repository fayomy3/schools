<?php
session_start();
include '../config/koneksi.php';

if(isset($_POST['simpan'])){
    $judul = $_POST['judul'];
    // Slug otomatis
    $slug = strtolower(str_replace(' ', '-', $judul));
    $isi = $_POST['isi'];
    $admin = $_SESSION['id_admin'];
    
    // Persiapan Upload
    $filename = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $folder_tujuan = "../assets/uploads/";
    
    // Cek apakah folder tujuan ada? Jika tidak, buat dulu.
    if (!file_exists($folder_tujuan)) {
        mkdir($folder_tujuan, 0777, true);
    }

    // Cek apakah user benar-benar memilih file?
    if($filename != "") {
        // Tambahkan angka acak agar nama file tidak bentrok
        $nama_file_baru = rand(100, 999) . "-" . $filename;
        $path_file = $folder_tujuan . $nama_file_baru;

        // Coba Upload
        if(move_uploaded_file($tmp_name, $path_file)){
            // Jika upload sukses, baru masukkan ke database
            $simpan = mysqli_query($conn, "INSERT INTO tb_artikel (judul, slug, isi_konten, gambar_sampul, id_penulis) VALUES ('$judul', '$slug', '$isi', '$nama_file_baru', '$admin')");
            
            if($simpan){
                echo "<script>alert('Berita Berhasil Disimpan!'); location='berita.php';</script>";
            } else {
                echo "<script>alert('Gagal simpan ke database: ".mysqli_error($conn)."');</script>";
            }
        } else {
            // Jika move_uploaded_file gagal
            echo "<script>alert('Gagal mengupload gambar. Pastikan folder assets/uploads ada dan memiliki izin tulis.');</script>";
        }
    } else {
        echo "<script>alert('Harap pilih gambar terlebih dahulu!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Tambah Berita</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <h3>Tambah Berita Baru</h3>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul Artikel</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Isi Berita</label>
            <textarea name="isi" class="form-control" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label>Gambar Sampul</label>
            <input type="file" name="gambar" class="form-control" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="berita.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>
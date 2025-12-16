<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Sekolah Kita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="assets/img/nebo.png" >
    <style>
        /* CSS Tambahan Sederhana */
        body { padding-top: 70px; } /* Supaya konten tidak tertutup navbar */
        .footer { background: #333; color: white; padding: 20px 0; margin-top: 50px;}
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php"><b>SMK HEBAT</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="profil.php">Profil</a></li>
        <li class="nav-item"><a class="nav-link" href="guru.php">Guru</a></li>
        <li class="nav-item"><a class="nav-link" href="berita.php">Berita</a></li>
        <li class="nav-item"><a class="nav-link" href="galeri.php">Galeri</a></li>
        <li class="nav-item"><a class="nav-link" href="kontak.php">Kontak</a></li>
        <li class="nav-item ms-3">
            <a class="btn btn-warning btn-sm" href="admin/login.php">Login Admin</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
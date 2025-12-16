<?php
session_start();
include '../config/koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    // PENGAMANAN 1: Gunakan Prepared Statement (Anti SQL Injection)
    $stmt = mysqli_prepare($conn, "SELECT * FROM tb_admin WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) === 1) {
        $data = mysqli_fetch_assoc($result);
        
        // PENGAMANAN 2: Cek password (sekarang masih plain text, nanti harus di-hash)
        // Jika nanti sudah pakai hash, ganti jadi: if (password_verify($password, $data['password']))
        if ($password == $data['password']) { 
            $_SESSION['status_login'] = true;
            $_SESSION['nama_admin'] = $data['nama_lengkap'];
            $_SESSION['id_admin'] = $data['id'];
            echo "<script>alert('Login Berhasil!'); location='index.php';</script>";
        } else {
            echo "<script>alert('Password Salah!'); location='login.php';</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!'); location='login.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Administrator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; display: flex; align-items: center; justify-content: center; height: 100vh; }
        .card-login { width: 350px; }
    </style>
</head>
<body>
    <div class="card card-login shadow">
        <div class="card-body p-4">
            <h4 class="text-center mb-4">Login Admin</h4>
            <form method="post">
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="user" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="pass" class="form-control" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary w-100">Masuk</button>
            </form>
            <div class="text-center mt-3">
                <a href="../index.php" class="text-decoration-none small">Kembali ke Website</a>
            </div>
        </div>
    </div>
</body>
</html>
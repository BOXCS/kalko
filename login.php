<?php
include 'koneksi.php';
session_start();

if (isset($_POST['submit_login'])) {
    // Ambil data dari form
    $email = mysqli_real_escape_string($kalkoKoneksi, $_POST['email']);
    $password = mysqli_real_escape_string($kalkoKoneksi, $_POST['password']);

    // Query untuk mendapatkan data user berdasarkan email
    $sql = "SELECT * FROM t_user WHERE email = '$email'";
    $query = mysqli_query($kalkoKoneksi, $sql);
    $row = mysqli_num_rows($query);

    if ($row > 0) {
        // Ambil data user
        $data = mysqli_fetch_assoc($query);

        // Verifikasi password dengan perbandingan langsung
        if ($password === $data['password']) {
            // Simpan data user ke session
            $_SESSION['username'] = $data['username']; // Atau nama lainnya
            $_SESSION['full_name'] = $data['full_name'];
            $_SESSION['email'] = $data['email'];

            // Redirect ke dashboard.php
            header("Location: dashboard.php");
            exit;
        } else {
            // Menampilkan pesan error jika password tidak cocok
            echo "<script>alert('Password Salah');</script>";
        }
    } else {
        echo "<script>alert('Email tidak ditemukan');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login UI</title>
    <link href="assets/css/auth.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <!-- Left Section with Image -->
        <div class="image-section">
            <img src="/assets/img/login-side.svg" alt="Left Side Image">
        </div>

        <!-- Right Section with Form -->
        <div class="form-section">
            <!-- Sign-In Button -->
            <div class="btn-sign-in">
                <a href="index.php" class="sign-in-btn">Sign-Up</a>
            </div>

            <div class="form-container">
                <!-- White Box on the Right -->
                <div class="white-box"></div>

                <!-- Form Container -->
                <div class="container">
                    <h1>Welcome Back</h1>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <button type="submit" name="submit_login" class="btn">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

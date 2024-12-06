<?php
include 'koneksi.php';

if (isset($_POST['submit_register'])) {
    // Ambil data dari form
    $full_name = mysqli_real_escape_string($kalkoKoneksi, $_POST['full_name']);
    $username = mysqli_real_escape_string($kalkoKoneksi, $_POST['username']);
    $email = mysqli_real_escape_string($kalkoKoneksi, $_POST['email']);
    $password = mysqli_real_escape_string($kalkoKoneksi, $_POST['password']);

    // Validasi sederhana untuk memastikan semua field terisi
    if (!empty($full_name) && !empty($username) && !empty($email) && !empty($password)) {
        // Query INSERT ke tabel t_user
        $sql = "INSERT INTO t_user (full_name, username, email, password) 
                VALUES ('$full_name', '$username', '$email', '$password')";

        // Eksekusi query
        if (mysqli_query($kalkoKoneksi, $sql)) {
            echo "<script>alert('Registration successful!');</script>";
        } else {
            echo "<script>alert('Registration failed: " . mysqli_error($kalkoKoneksi) . "');</script>";
        }
    } else {
        echo "<script>alert('Please fill in all fields!');</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register UI</title>
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
                <a href="login.php" class="sign-in-btn">Sign-In</a>
            </div>

            <div class="form-container">
                <!-- White Box on the Right -->
                <div class="white-box"></div>

                <!-- Form Container -->
                <div class="container">
                    <h1>Getting Started</h1>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" id="full_name" name="full_name" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <button type="submit" name="submit_register" class="btn">Sign-up</button>
                    </form>
                </div>

            </div>
        </div>

    </div>
</body>

</html>
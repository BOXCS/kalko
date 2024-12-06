<?php
session_start();

// Pastikan user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Arahkan ke login jika belum login
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <h1>Welcome to Your Dashboard!</h1>
        <p>Welcome, <strong><?php echo $_SESSION['full_name']; ?></strong> (<?php echo $_SESSION['username']; ?>)</p>
        <p>Email: <?php echo $_SESSION['email']; ?></p>

        <!-- Optional: You can add a logout button here -->
        <a href="logout.php">Logout</a>
    </div>

</body>
</html>

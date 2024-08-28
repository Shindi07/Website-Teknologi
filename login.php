<?php
include "service/database.php";
session_start();
$login_message = "";

// Redirect jika sudah login
if (isset($_SESSION["is_login"])) {
    header("location:dashboard.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash password yang diinput untuk dibandingkan dengan hash di database
    $hash_password = md5($password);

    // Siapkan dan jalankan query untuk memeriksa username dan password
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$hash_password'";
    $result = $db->query($sql);

    // Cek apakah ada hasil yang ditemukan
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        // Set session jika login berhasil
        $_SESSION["username"] = $data["username"];
        $_SESSION["is_login"] = true;

        // Redirect ke dashboard
        header("location:dashboard.php");
    } else {
        $login_message = "Akun tidak ditemukan atau password salah";
    }

    // Tutup koneksi
    $db->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php include "layout/header.html"; ?>
    <h3>Masuk Akun</h3>
    <i><?= $login_message; ?></i>
    <form action="login.php" method="POST">
        <input class="form-control" type="text" name="username" placeholder="Username" required>
        <input class="form-control" type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Masuk sekarang</button>
    </form>
    <br>
    <?php include "layout/footer.html"; ?>
</body>

</html>

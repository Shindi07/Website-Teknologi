<?php
include "service/database.php";
session_start();

$register_message = "";

// Redirect jika sudah login
if (isset($_SESSION["is_login"])) {
    header("location:dashboard.php");
    exit;
}

// Aktifkan mode exception untuk MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; // Password disimpan sesuai input pengguna
    $hash_password = md5($password); // Menggunakan md5 untuk hashing password

    try {
        // Siapkan statement dengan menggunakan placeholder (?)
        $sql = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");

        // Bind parameter untuk menghindari SQL Injection
        $sql->bind_param("ss", $username, $hash_password);

        // Eksekusi statement
        if ($sql->execute()) {
            $register_message = "Daftar akun berhasil, silakan login";
        }

        // Tutup statement
        $sql->close();
    } catch (mysqli_sql_exception $e) {
        // Tangkap error jika terjadi duplicate username
        if ($e->getCode() == 1062) {
            $register_message = "Username sudah ada, silakan ganti yang lain";
        } else {
            $register_message = "Terjadi kesalahan, silakan coba lagi";
        }
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
    <title>Register</title>
</head>

<body>
    <?php include "layout/header.html"; ?>
    <h3>Daftar Akun</h3>
    <i><?= $register_message; ?></i>
    <form action="register.php" method="POST">
        <input class="form-control" type="text" name="username" placeholder="Username" required>
        <input class="form-control" type="password" name="password" placeholder="Password" required>
        <button type="submit" name="register">Daftar Sekarang</button>
    </form>
    <br>
    <?php include "layout/footer.html"; ?>
</body>

</html>
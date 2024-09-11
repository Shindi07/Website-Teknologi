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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <!-- link awesome -->
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body class="register">

    <div class="global-from">
        <div class="register-form">
            <div class="card-form">
                <h3 class="register mb-5">R E G I S T E R</h3>
            </div>
            <i class="register-message mt-5"><?= $register_message; ?></i>
            <div class="card-text">
                <!-- form register -->
                <form action="register.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input class="form-control" type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <a href="index.php"><i class="fa-solid fa-arrow-left "></i></a>
                    <button type="submit" name="register">Register</button>
                </form>
                <!-- end form register -->
            </div>
        </div>
    </div>
    <br>
</body>

</html>
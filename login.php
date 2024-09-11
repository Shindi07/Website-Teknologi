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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <!-- link awesome -->
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body class="login">


    <div class="global-from">
        <div class="login-form">
            <div class="card-form">
                <h3 class="login mb-5">L O G I N</h3>
            </div>
            <i class=".login-message "><?= $login_message; ?></i>
            <div class="card-text">
                <!-- form login -->
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input class="form-control" type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>

                    <a href="index.php"><i class="fa-solid fa-arrow-left "></i></a>
                    <button type="submit" name="login">Log In</button>
                    <a href="register.php" class="btn btn-primary">Register</a>
            </div>
            </form>
            <!-- end form login -->
        </div>
    </div>
    </div>
</body>

</html>
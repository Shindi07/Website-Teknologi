<?php
session_start();

if ((isset($_POST["logout"]))) {
    // untuk nge clear semua datanya
    session_unset();

    // menghancurkan datanya
    session_destroy();

    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Dashboard</title>
</head>

<body>


    <h3>Selamat Datang <?= $_SESSION["username"] ?></h3>

    <form action="dashboard.php" method="POST">
        <button type="submit" name="logout">Logout</button>
    </form>

</body>

</html>
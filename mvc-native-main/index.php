<?php

require 'dist/database/functions.php';

if (isset($_POST["login"])) {
    $user = $_POST["user"];
    $password = $_POST["password"];

    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$user'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        // cek password dari db
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;
        }
        $role = $row['role'];
        if ($role === '1') {
            header('Location: dist/page/dashboardAdmin.php');
        } else {
            header('Location: dist/page/dashboard.php');
        }
    }

    $error = true;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/index.css">
    <title>Toko app | login</title>
</head>

<body>

    <div class="auth">
        <div class="head-title">
            <h2 style="text-align: center;">Login</h2>
        </div>
        <?php if (isset($error)) : ?>
            <p style="color: red; font-style: italic;">Username/password tidak tersedia!</p>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="form-input">
                <input type="text" class="input" placeholder="Username" name="user">
            </div>
            <div class="form-input">
                <input type="password" class="input" placeholder="Password" name="password">
            </div>
            <div class="form-input">
                <button class="btn" type="submit" name="login">Login</button>
            </div>
            <div class="form-input">
                <a class="btn" href="dist/page/regist.php">Daftar</a>
            </div>
        </form>
    </div>

</body>

</html>
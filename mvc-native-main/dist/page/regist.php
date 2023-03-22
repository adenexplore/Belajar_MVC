<?php
require '../database/functions.php';

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "
                <script>
                    alert('Akun berhasil diregistrasi!');
                </script>
                ";
    } else {
        echo mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title>Toko app | Registrasi</title>
</head>

<body>

    <div class="auth">
        <div class="head-title">
            <h2 style="text-align: center;">Registrasi</h2>
        </div>
        <form action="" method="POST">
            <div class="form-input">
                <input type="text" class="input" placeholder="Fullname" name="fullname">
            </div>
            <div class="form-input">
                <input type="text" class="input" placeholder="Username" name="username">
            </div>
            <div class="form-input">
                <input type="password" class="input" placeholder="Password" name="password">
            </div>
            <div class="form-input">
                <input type="password" class="input" placeholder="Confirm password" name="password2">
            </div>
            <div class="form-input">
                <button class="btn" type="submit" name="register">Registrasi</button>
            </div>
            <div class="form-input">
                <a class="btn" href="../../index.php">Login</a>
            </div>
        </form>
    </div>

</body>

</html>
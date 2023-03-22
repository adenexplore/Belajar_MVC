<?php

require_once '../database/functions.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>toko - app | beli produk</title>
</head>

<body>


    <?php
    // include '../database/functions.php';
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * FROM produk WHERE id = $id");
    while ($d = mysqli_fetch_array($data)) {
    ?>
        <form method="POST" action="struk.php">
            <input type="hidden" name="id" value="<?= $d['id']; ?>">
            <table>
                <tr>
                    <td>Nama produk : </td>
                    <td><input type="text" name="nama_produk" value="<?= $d['nama_produk']; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Stok barang : </td>
                    <td><input type="text" name="stok" value="<?php if (!isset($_POST['beli'])) {
                                                                    echo $d['stok'];
                                                                } else if ($newStok >= 0) {
                                                                    echo $newStok;
                                                                } else {
                                                                    echo 0;
                                                                } ?>" readonly></td>
                </tr>
                <tr>
                    <td>Kategori : </td>
                    <td><input type="text" name="kategori" value="<?= $d['kategori']; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Harga : </td>
                    <td><input type="number" name="harga" value=<?= $d['harga']; ?> readonly></td>
                </tr>
                <tr>
                    <td>Jumlah yang mau di beli : </td>
                    <td><input type="number" name="jml_produk" value="1"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="beli" value="Beli"></td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
    <a href="dashboard.php">Kembali</a>

</body>

</html>
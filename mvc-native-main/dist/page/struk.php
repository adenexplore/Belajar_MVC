<!DOCTYPE html>
<html>

<head>
    <title>toko app | struk</title>
</head>

<body>

    <h1>Struk</h1>

    <table border="1" cellpadding="10" cellspacing="0">


        <table>
            <?php
            if (isset($_POST['beli'])) {
                $namaBarang = $_POST['nama_produk'];
                $harga = $_POST['harga'];
                $kategori = $_POST['kategori'];
                $stok = $_POST['stok'];
                $jml_produk = $_POST['jml_produk'];
                $newStok = $stok - $jml_produk;
                $produkId = $_POST['id'];

                $totalHarga = intval($harga) * $jml_produk;
            }
            ?>
            <tr>
                <td>Nama produk : </td>
                <td><input type="text" name="nama_produk" value="<?= $namaBarang; ?>" readonly></td>
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
                <td><input type="text" name="kategori" value="<?= $kategori; ?>" readonly></td>
            </tr>
            <tr>
                <td>Harga yang dibayar : </td>
                <td><input type="number" name="harga" value=<?= $totalHarga; ?> readonly></td>
            </tr>
            <tr>
                <td>Jumlah yang mau di beli : </td>
                <td><input type="number" name="jml_produk" value="1"></td>
            </tr>
        </table>
        <a href="dashboard.php">Kembali</a>

    </table>

</body>

</html>
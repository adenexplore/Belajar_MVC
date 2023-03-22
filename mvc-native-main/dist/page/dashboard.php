<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>toko app | dashboard</title>
</head>

<body>
    <h2>Dashboard user</h2>
    <!-- Produk -->
    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>NO.</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>

        <?php
        include '../database/functions.php';
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM produk");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d['nama_produk']; ?> </td>
                <td><?= $d['kategori']; ?> </td>
                <td><?= $d['harga']; ?> </td>
                <td>
                    <a href="beliProduk.php?id=<?= $d['id']; ?>">Beli</a>
                </td>
            </tr>
        <?php
        }
        ?>


    </table>
    <!-- Produk end -->
    <a href="../../index.php">Logout</a>
</body>

</html>
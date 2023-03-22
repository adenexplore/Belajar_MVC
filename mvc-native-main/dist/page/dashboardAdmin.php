<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>toko app | dashboard</title>
</head>

<body>
    <h2>Dashboard admin</h2>
    <!-- Produk -->
    <a href="./aksiAdmin/tambah.php">Tambah produk</a>
    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>NO.</th>
            <th>Nama Produk</th>
            <th>Stok Produk</th>
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
                <td><?= $d['stok']; ?> </td>
                <td><?= $d['kategori']; ?> </td>
                <td><?= $d['harga']; ?> </td>
                <td>
                    <a href="./aksiAdmin/edit.php?id=<?= $d['id']; ?>">Edit</a> |
                    <a href="./aksiAdmin/hapus.php?id=<?= $d['id']; ?>" onclick="return confirm('yakin?')">Hapus</a>
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
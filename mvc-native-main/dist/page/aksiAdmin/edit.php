<?php


require '../../database/functions.php';
// ambil data di url

$id = $_GET["id"];
// query data 
$mhs = query("SELECT * FROM produk WHERE id = $id")[0];
// cek data dari form
if (isset($_POST["submit"])) {
    if (edit($_POST) > 0) {
        echo "
			<script>
				alert('Data berhasil diubah!');
                document.location.href = '../dashboardAdmin.php';
                </script>
                ";
    } else {
        echo "
                <script>
                alert('Data gagal diubah!');
                document.location.href = '../dashboardAdmin.php';
                 </script>
		";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin toko | edit</title>
</head>

<body>
    <?php
    // include '../../database/functions.php';
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * FROM produk WHERE id = $id");
    while ($d = mysqli_fetch_array($data)) {
    ?>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $d['id']; ?>">
            <table>
                <tr>
                    <td>Nama produk : </td>
                    <td><input type="text" name="nama_produk" value="<?= $d['nama_produk']; ?>"></td>
                </tr>
                <tr>
                    <td>Stok : </td>
                    <td><input type="number" name="stok" value="<?= $d['stok']; ?>"></td>
                </tr>
                <tr>
                    <td>Kategori : </td>
                    <td><input type="text" name="kategori" value="<?= $d['kategori']; ?>"></td>
                </tr>
                <tr>
                    <td>Harga : </td>
                    <td><input type="text" name="harga" value="<?= $d['harga']; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Edit"></td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>
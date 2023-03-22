<?php

require '../../database/functions.php';

// cek data dari form
if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
			<script>
				alert('Data berhasil ditambah!');
				document.location.href = '../dashboardAdmin.php';
			</script>
		";
    } else {
        echo "
			<script>
				alert('Data gagal ditambah!');
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
    <title>admin toko | tambah produk</title>
</head>

<body>
    <form method="POST">
        <table>
            <tr>
                <input type="hidden" name="id">
                <td>Nama produk: </td>
                <td><input type="text" name="nama_produk"></td>
            </tr>
            <tr>
                <td>Stok : </td>
                <td><input type="number" name="stok"> </td>
            </tr>
            <tr>
                <td>Kategori : </td>
                <td><input type="text" name="kategori"> </td>
            </tr>
            <tr>
                <td>Harga : </td>
                <td><input type="number" name="harga"> </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="TAMBAH"></td>
            </tr>
        </table>
    </form>
</body>

</html>
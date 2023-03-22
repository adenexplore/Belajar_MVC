<?php


$koneksi = mysqli_connect('localhost', 'root', '', 'db_toko1');

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data)
{
    global $koneksi;

    $user = strtolower(stripcslashes($data["username"]));
    $fullname = strtolower(stripcslashes($data["fullname"]));
    $pw = mysqli_real_escape_string($koneksi, $data["password"]);
    $pw2 = mysqli_real_escape_string($koneksi, $data["password2"]);

    // cek username tersedia
    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$user'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah terdaftar!');
              </script>";
        return false;
    }

    // cek konfirmasi password
    if ($pw !== $pw2) {
        echo "<script>
                alert('Password tidak sesuai!');
              </script>";
        return false;
    }

    // enkripsi password
    $pw = password_hash($pw, PASSWORD_DEFAULT);

    // insert pw ke database
    mysqli_query($koneksi, "INSERT INTO user VALUES('', '$user', '$fullname', '', '$pw')");
    return mysqli_affected_rows($koneksi);
}

function tambah($data)
{
    global $koneksi;
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $stok = htmlspecialchars($data["stok"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $harga = htmlspecialchars($data["harga"]);
    $query = "INSERT INTO produk VALUES('', '$nama_produk', '$stok', '$kategori', '$harga')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function edit($data)
{
    global $koneksi;
    $id = $data["id"];
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $stok = htmlspecialchars($data["stok"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $harga = htmlspecialchars($data["harga"]);


    $query = "UPDATE produk SET nama_produk = '$nama_produk', stok = '$stok', kategori = '$kategori', harga = '$harga' WHERE id = $id";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function hapus($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM produk where id = $id");
    return mysqli_affected_rows($koneksi);
}

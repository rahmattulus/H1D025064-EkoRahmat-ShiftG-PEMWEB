<?php
require_once __DIR__.'/../../koneksi.php';
// include('koneksi.php');
    if (isset($_POST['submit'])) {
        $nama_brg = $_POST['nama_brg'];
        $harga = $_POST['harga'];

        $result = mysqli_query($koneksi, "INSERT INTO barang(nama_brg, harga) VALUES('$nama_brg', '$harga')");

        header("Location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
</head>
<body>
    <h1>Tambah Barang</h1>
    <a href="index.php">Batal</a>
    <form action="create.php" method="post">
        <table>
            <tr>
                <td>Nama Barang</td>
                <td>
                    <input type="text" name="nama_brg" id="">
                </td>
            </tr>
            <tr>
                <td>harga</td>
                <td>
                    <input type="text" name="harga" id="">
                </td>
            </tr>
            <tr><td> <input type="submit" name="submit" value="Simpan"> </td></tr>
        </table>
    </form>
</body>
</html>
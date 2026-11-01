<?php
require_once __DIR__.'/../../koneksi.php';
// include('koneksi.php');
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $nama_brg = $_POST['nama_brg'];
        $harga = $_POST['harga'];

        $result = mysqli_query($koneksi, "UPDATE barang SET nama_brg='$nama_brg', harga='$harga' where id=$id");

        header("Location:index.php");
    }

    $id = $_GET['id'];
    $update = mysqli_query($koneksi, "SELECT * FROM barang where id=$id");
    while ($data = mysqli_fetch_array($update)) {
        $nama_brg = $data['nama_brg'];
        $harga = $data['harga'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Barang</title>
</head>
<body>
    <h1>Update Barang</h1>
    <a href="index.php">Batal</a>
    <form action="update.php" method="post">
        <table>
            <tr>
                <td>Nama Barang</td>
                <td>
                    <input type="text" name="nama_brg" value="<?= $nama_brg; ?>">
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>
                    <input type="text" name="harga" value="<?= $harga; ?>">
                </td>
            </tr>
            <tr>
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                <td> <input type="submit" name="update" value="Simpan"> </td>
            </tr>
        </table>
    </form>
</body>
</html>
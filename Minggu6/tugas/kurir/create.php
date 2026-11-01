<?php
require_once __DIR__.'/../../koneksi.php';

if (isset($_POST['submit'])) {
    $nama_kurir = $_POST['nama_kurir'];
    $no_hp = $_POST['no_hp'];

    $result = mysqli_query($koneksi, "INSERT INTO kurir(nama_kurir, no_hp) VALUES('$nama_kurir', '$no_hp')");

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kurir</title>
</head>
<body>
    <h1>Tambah Kurir</h1>
    <a href="index.php">Batal</a>
    <form action="create.php" method="post">
        <table>
            <tr>
                <td>Nama Kurir</td>
                <td>
                    <input type="text" name="nama_kurir" id="" required>
                </td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td>
                    <input type="text" name="no_hp" id="" required>
                </td>
            </tr>
            <tr>
                <td> <input type="submit" name="submit" value="Simpan"> </td>
            </tr>
        </table>
    </form>
</body>
</html>

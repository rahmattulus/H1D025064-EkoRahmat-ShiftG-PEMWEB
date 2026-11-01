<?php
require_once __DIR__.'/../../koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    $result = mysqli_query($koneksi, "INSERT INTO pembeli(nama, no_hp, alamat) VALUES('$nama', '$no_hp', '$alamat')");

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pembeli</title>
</head>
<body>
    <h1>Tambah Pembeli</h1>
    <a href="index.php">Batal</a>
    <form action="create.php" method="post">
        <table>
            <tr>
                <td>Nama Pembeli</td>
                <td>
                    <input type="text" name="nama" id="" required>
                </td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td>
                    <input type="text" name="no_hp" id="" required>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    <textarea name="alamat" id="" rows="4" cols="30" required></textarea>
                </td>
            </tr>
            <tr>
                <td> <input type="submit" name="submit" value="Simpan"> </td>
            </tr>
        </table>
    </form>
</body>
</html>

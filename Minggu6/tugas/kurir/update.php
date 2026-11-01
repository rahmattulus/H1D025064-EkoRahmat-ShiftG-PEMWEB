<?php
require_once __DIR__.'/../../koneksi.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_kurir = $_POST['nama_kurir'];
    $no_hp = $_POST['no_hp'];

    $result = mysqli_query($koneksi, "UPDATE kurir SET nama_kurir='$nama_kurir', no_hp='$no_hp' WHERE id=$id");

    header("Location:index.php");
}

$id = $_GET['id'];
$update = mysqli_query($koneksi, "SELECT * FROM kurir WHERE id=$id");
while ($data = mysqli_fetch_array($update)) {
    $nama_kurir = $data['nama_kurir'];
    $no_hp = $data['no_hp'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Kurir</title>
</head>
<body>
    <h1>Update Kurir</h1>
    <a href="index.php">Batal</a>
    <form action="update.php" method="post">
        <table>
            <tr>
                <td>Nama Kurir</td>
                <td>
                    <input type="text" name="nama_kurir" value="<?= $nama_kurir; ?>" required>
                </td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td>
                    <input type="text" name="no_hp" value="<?= $no_hp; ?>" required>
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

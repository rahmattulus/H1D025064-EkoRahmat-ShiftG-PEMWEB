<?php
require_once __DIR__.'/../../koneksi.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    $result = mysqli_query($koneksi, "UPDATE pembeli SET nama='$nama', no_hp='$no_hp', alamat='$alamat' WHERE id=$id");

    header("Location:index.php");
}

$id = $_GET['id'];
$update = mysqli_query($koneksi, "SELECT * FROM pembeli WHERE id=$id");
while ($data = mysqli_fetch_array($update)) {
    $nama = $data['nama'];
    $no_hp = $data['no_hp'];
    $alamat = $data['alamat'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pembeli</title>
</head>
<body>
    <h1>Update Pembeli</h1>
    <a href="index.php">Batal</a>
    <form action="update.php" method="post">
        <table>
            <tr>
                <td>Nama Pembeli</td>
                <td>
                    <input type="text" name="nama" value="<?= $nama; ?>" required>
                </td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td>
                    <input type="text" name="no_hp" value="<?= $no_hp; ?>" required>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    <textarea name="alamat" rows="4" cols="30" required><?= $alamat; ?></textarea>
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

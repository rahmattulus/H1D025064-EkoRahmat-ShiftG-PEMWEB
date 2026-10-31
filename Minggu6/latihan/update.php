<?php
require_once __DIR__.'/../koneksi.php';
// include('koneksi.php');
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $konten = $_POST['konten'];

        $result = mysqli_query($koneksi, "UPDATE posts SET judul='$judul', konten='$konten' where id=$id");

        header("Location:index.php");
    }

    $id = $_GET['id'];
    $update = mysqli_query($koneksi, "SELECT * FROM posts where id=$id");
    while ($data = mysqli_fetch_array($update)) {
        $judul = $data['judul'];
        $konten = $data['konten'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
</head>
<body>
    <h1>Tambah Articel</h1>
    <a href="index.php">Batal</a>
    <form action="update.php" method="post">
        <table>
            <tr>
                <td>Judul</td>
                <td>
                    <input type="text" name="judul" value="<?= $judul; ?>">
                </td>
            </tr>
            <tr>
                <td>Articel</td>
                <td>
                    <textarea name="konten"><?= $konten; ?></textarea>
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
<?php
require_once __DIR__.'/../koneksi.php';
// include('koneksi.php');
    if (isset($_POST['submit'])) {
        $judul = $_POST['judul'];
        $konten = $_POST['konten'];

        $result = mysqli_query($koneksi, "INSERT INTO posts(judul, konten) VALUES('$judul', '$konten')");

        header("Location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Data</title>
</head>
<body>
    <h1>Tambah Articel</h1>
    <a href="index.php">Batal</a>
    <form action="create.php" method="post">
        <table>
            <tr>
                <td>Judul</td>
                <td>
                    <input type="text" name="judul" id="">
                </td>
            </tr>
            <tr>
                <td>Articel</td>
                <td>
                    <textarea name="konten" id=""></textarea>
                </td>
            </tr>
            <tr><td> <input type="submit" name="submit" value="Simpan"> </td></tr>
        </table>
    </form>
</body>
</html>
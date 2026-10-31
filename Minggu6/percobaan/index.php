<?php
require_once __DIR__.'/../koneksi.php';
$read = mysqli_query($koneksi, "SELECT * FROM pengguna ORDER BY id");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX CRUD</title>
</head>

<body>
    <h1>Menampilkan data dari DB</h1>
    <a href="create.php"><button>+ Tambah Data</button></a>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th></th>
        </tr>
        <?php while ($user = mysqli_fetch_assoc($read)) { ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['password'] ?></td>
                <td>
                    <a href="update.php?id=<?= $user['id'] ?>">EDIT</a>
                    <a href="delete.php?id=<?= $user['id'] ?>">HAPUS</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>
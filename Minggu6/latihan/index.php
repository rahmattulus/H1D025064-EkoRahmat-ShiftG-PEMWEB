<?php
require_once __DIR__.'/../koneksi.php';
$read = mysqli_query($koneksi, "SELECT * FROM posts ORDER BY id");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST CRUD</title>
</head>

<body>
    <h1>POSTS NEWS TER-UPDATE</h1>
    <a href="create.php"><button>+ Tambah Data</button></a>
        <?php while ($articel = mysqli_fetch_assoc($read)) { ?>
            <h2><?= $articel['id'] ?>. <?= $articel['judul'] ?></h2>
            <a href="update.php?id=<?= $articel['id'] ?>">EDIT</a> | <a href="delete.php?id=<?= $articel['id'] ?>">HAPUS</a>
            <p> <?= nl2br($articel['konten']) ?> </p>
        <?php } ?>
    </table>
</body>

</html>
<?php
require_once __DIR__.'/../../koneksi.php';
$read = mysqli_query($koneksi, "SELECT * FROM pembeli ORDER BY id");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PEMBELI</title>
</head>

<body>
    <h1>CRUD PEMBELI</h1>
    <a href="../index.php"><button>&laquo; Kembali ke Menu Utama</button></a>
    <a href="create.php"><button>+ Tambah Data</button></a>
    
    <?php while ($pembeli = mysqli_fetch_assoc($read)) { ?>
        <h2><?= $pembeli['id'] ?>. <?= $pembeli['nama'] ?></h2>
        <a href="update.php?id=<?= $pembeli['id'] ?>">EDIT</a> | <a href="delete.php?id=<?= $pembeli['id'] ?>">HAPUS</a>
        <p>No. HP: <?= nl2br($pembeli['no_hp']) ?> <br> Alamat: <?= nl2br($pembeli['alamat']) ?></p>
    <?php } ?>
</body>

</html>

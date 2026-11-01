<?php
require_once __DIR__.'/../../koneksi.php';
$read = mysqli_query($koneksi, "SELECT * FROM kurir ORDER BY id");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD KURIR</title>
</head>

<body>
    <h1>CRUD KURIR</h1>
    <a href="../index.php"><button>&laquo; Kembali ke Menu Utama</button></a>
    <a href="create.php"><button>+ Tambah Data</button></a>
    
    <?php while ($kurir = mysqli_fetch_assoc($read)) { ?>
        <h2><?= $kurir['id'] ?>. <?= $kurir['nama_kurir'] ?></h2>
        <a href="update.php?id=<?= $kurir['id'] ?>">EDIT</a> | <a href="delete.php?id=<?= $kurir['id'] ?>">HAPUS</a>
        <p>No. HP: <?= nl2br($kurir['no_hp']) ?> </p>
    <?php } ?>
</body>

</html>

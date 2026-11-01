<?php
require_once __DIR__.'/../../koneksi.php';
$read = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD BARANG</title>
</head>

<body>
    <h1>CRUD BARANG</h1>
    <a href="../index.php"><button>&laquo; Kembali ke Menu Utama</button></a>
    <a href="create.php"><button>+ Tambah Data</button></a>
        <?php while ($barang = mysqli_fetch_assoc($read)) { ?>
            <h2><?= $barang['id'] ?>. <?= $barang['nama_brg'] ?></h2>
            <a href="update.php?id=<?= $barang['id'] ?>">EDIT</a> | <a href="delete.php?id=<?= $barang['id'] ?>">HAPUS</a>
            <p> <?= nl2br($barang['harga']) ?> </p>
        <?php } ?>
</body>

</html>
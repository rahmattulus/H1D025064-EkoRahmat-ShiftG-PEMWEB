<?php
require_once __DIR__ . '/../koneksi.php';

// Tambah data
if (isset($_POST['simpan'])) {
    $nama_brg = $_POST['nama_brg'];
    $harga = $_POST['harga'];
    mysqli_query($koneksi, "INSERT INTO barang(nama_brg, harga) VALUES('$nama_brg', '$harga')");
    header("Location: barang.php");
}

// Update data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_brg = $_POST['nama_brg'];
    $harga = $_POST['harga'];
    mysqli_query($koneksi, "UPDATE barang SET nama_brg='$nama_brg', harga='$harga' WHERE id=$id");
    header("Location: barang.php");
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM barang WHERE id=$id");
    header("Location: barang.php");
}

// Ambil semua data barang
$read = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id");

// Ambil data untuk form edit
// $id = '';
// $nama_brg = '';
// $harga = '';
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id=$id");
    while ($data = mysqli_fetch_array($query)) {
        $nama_brg = $data['nama_brg'];
        $harga = $data['harga'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Barang</title>
</head>
<body>
    <h1>CRUD BARANG</h1>
    <a href="index.php"><button>&laquo; Kembali ke Menu Utama</button></a>
    <a href="pembeli.php"><button>Kelola Pembeli</button></a>
    <a href="kurir.php"><button>Kelola Kurir</button></a>

    <h2><?= isset($_GET['edit']) ? 'Edit Barang' : 'Tambah Barang'; ?></h2>
    <form action="barang.php" method="post">
        <table>
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="nama_brg" value="<?= $nama_brg ?? ""; ?>"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga" value="<?= $harga ?? ""; ?>"></td>
            </tr>
            <tr>
                <input type="hidden" name="id" value="<?= $id; ?>">
                <td>
                    <?php if (isset($_GET['edit'])) { ?>
                        <input type="submit" name="update" value="Update">
                        <a href="barang.php">Batal</a>
                    <?php } else { ?>
                        <input type="submit" name="simpan" value="Simpan">
                    <?php } ?>
                </td>
            </tr>
        </table>
    </form>

    <h2>Daftar Barang</h2>
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php while ($data = mysqli_fetch_array($read)) { ?>
            <tr>
                <td><?= $data['id']; ?></td>
                <td><?= $data['nama_brg']; ?></td>
                <td><?= $data['harga']; ?></td>
                <td>
                    <a href="barang.php?edit=<?= $data['id']; ?>">Edit</a> | 
                    <a href="barang.php?hapus=<?= $data['id']; ?>">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

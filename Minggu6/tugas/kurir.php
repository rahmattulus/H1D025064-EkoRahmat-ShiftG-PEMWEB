<?php
require_once __DIR__ . '/../koneksi.php';

// Tambah data
if (isset($_POST['simpan'])) {
    $nama_kurir = $_POST['nama_kurir'];
    $no_hp = $_POST['no_hp'];
    mysqli_query($koneksi, "INSERT INTO kurir(nama_kurir, no_hp) VALUES('$nama_kurir', '$no_hp')");
    header("Location: kurir.php");
}

// Update data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_kurir = $_POST['nama_kurir'];
    $no_hp = $_POST['no_hp'];
    mysqli_query($koneksi, "UPDATE kurir SET nama_kurir='$nama_kurir', no_hp='$no_hp' WHERE id=$id");
    header("Location: kurir.php");
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM kurir WHERE id=$id");
    header("Location: kurir.php");
}

// Ambil data untuk form edit
$id = '';
$nama_kurir = '';
$no_hp = '';
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $query = mysqli_query($koneksi, "SELECT * FROM kurir WHERE id=$id");
    while ($data = mysqli_fetch_array($query)) {
        $nama_kurir = $data['nama_kurir'];
        $no_hp = $data['no_hp'];
    }
}

// Ambil semua data kurir
$read = mysqli_query($koneksi, "SELECT * FROM kurir ORDER BY id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Kurir</title>
</head>
<body>
    <h1>CRUD KURIR</h1>
    <a href="index.php"><button>&laquo; Kembali ke Menu Utama</button></a>
    <a href="barang.php"><button>Kelola Barang</button></a>
    <a href="pembeli.php"><button>Kelola Pembeli</button></a>

    <h2><?= isset($_GET['edit']) ? 'Edit Kurir' : 'Tambah Kurir'; ?></h2>
    <form action="kurir.php" method="post">
        <table>
            <tr>
                <td>Nama Kurir</td>
                <td><input type="text" name="nama_kurir" value="<?= $nama_kurir; ?>"></td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td><input type="text" name="no_hp" value="<?= $no_hp; ?>"></td>
            </tr>
            <tr>
                <input type="hidden" name="id" value="<?= $id; ?>">
                <td>
                    <?php if (isset($_GET['edit'])) { ?>
                        <input type="submit" name="update" value="Update">
                        <a href="kurir.php">Batal</a>
                    <?php } else { ?>
                        <input type="submit" name="simpan" value="Simpan">
                    <?php } ?>
                </td>
            </tr>
        </table>
    </form>

    <h2>Daftar Kurir</h2>
    <table border="1"  cellspacing="0" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nama Kurir</th>
            <th>No. HP</th>
            <th>Aksi</th>
        </tr>
        <?php while ($data = mysqli_fetch_array($read)) { ?>
            <tr>
                <td><?= $data['id']; ?></td>
                <td><?= $data['nama_kurir']; ?></td>
                <td><?= $data['no_hp']; ?></td>
                <td>
                    <a href="kurir.php?edit=<?= $data['id']; ?>">Edit</a> | 
                    <a href="kurir.php?hapus=<?= $data['id']; ?>">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

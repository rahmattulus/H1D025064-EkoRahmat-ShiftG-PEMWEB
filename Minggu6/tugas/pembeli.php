<?php
require_once __DIR__ . '/../koneksi.php';

// Tambah data
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    mysqli_query($koneksi, "INSERT INTO pembeli(nama, no_hp, alamat) VALUES('$nama', '$no_hp', '$alamat')");
    header("Location: pembeli.php");
}

// Update data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    mysqli_query($koneksi, "UPDATE pembeli SET nama='$nama', no_hp='$no_hp', alamat='$alamat' WHERE id=$id");
    header("Location: pembeli.php");
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM pembeli WHERE id=$id");
    header("Location: pembeli.php");
}

// Ambil data untuk form edit
$id = '';
$nama = '';
$no_hp = '';
$alamat = '';
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $query = mysqli_query($koneksi, "SELECT * FROM pembeli WHERE id=$id");
    while ($data = mysqli_fetch_array($query)) {
        $nama = $data['nama'];
        $no_hp = $data['no_hp'];
        $alamat = $data['alamat'];
    }
}

// Ambil semua data pembeli
$read = mysqli_query($koneksi, "SELECT * FROM pembeli ORDER BY id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Pembeli</title>
</head>
<body>
    <h1>CRUD PEMBELI</h1>
    <a href="index.php"><button>&laquo; Kembali ke Menu Utama</button></a>
    <a href="barang.php"><button>Kelola Barang</button></a>
    <a href="kurir.php"><button>Kelola Kurir</button></a>

    <h2><?= isset($_GET['edit']) ? 'Edit Pembeli' : 'Tambah Pembeli'; ?></h2>
    <form action="pembeli.php" method="post">
        <table>
            <tr>
                <td>Nama Pembeli</td>
                <td><input type="text" name="nama" value="<?= $nama; ?>"></td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td><input type="text" name="no_hp" value="<?= $no_hp; ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat"><?= $alamat; ?></textarea></td>
            </tr>
            <tr>
                <input type="hidden" name="id" value="<?= $id; ?>">
                <td>
                    <?php if (isset($_GET['edit'])) { ?>
                        <input type="submit" name="update" value="Update">
                        <a href="pembeli.php">Batal</a>
                    <?php } else { ?>
                        <input type="submit" name="simpan" value="Simpan">
                    <?php } ?>
                </td>
            </tr>
        </table>
    </form>

    <h2>Daftar Pembeli</h2>
    <table  border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nama Pembeli</th>
            <th>No. HP</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php while ($data = mysqli_fetch_array($read)) { ?>
            <tr>
                <td><?= $data['id']; ?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['no_hp']; ?></td>
                <td><?= $data['alamat']; ?></td>
                <td>
                    <a href="pembeli.php?edit=<?= $data['id']; ?>">Edit</a> | 
                    <a href="pembeli.php?hapus=<?= $data['id']; ?>">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

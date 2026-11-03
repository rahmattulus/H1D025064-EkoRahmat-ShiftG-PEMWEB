<?php
require_once __DIR__.'/../koneksi.php';

$query = "SELECT 
            barang.id,
            barang.nama_brg,
            barang.harga,
            pembeli.nama AS nama_pembeli,
            pembeli.no_hp AS no_hp_pembeli,
            pembeli.alamat AS alamat_pembeli,
            kurir.nama_kurir,
            kurir.no_hp AS no_hp_kurir
          FROM barang
          INNER JOIN pembeli ON barang.id = pembeli.id
          INNER JOIN kurir ON barang.id = kurir.id
          ORDER BY barang.id ASC";

$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Gabungan - Tugas Minggu 6</title>
    <!-- <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        nav {
            margin-bottom: 20px;
        }
        nav a {
            text-decoration: none;
            margin-right: 10px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 15px;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            padding: 8px 14px;
            cursor: pointer;
        }
    </style> -->
</head>

<body>
    <h3>List Pesanan</h3>
    <nav>
        <a href="barang.php"><button>Kelola Barang</button></a>
        <a href="pembeli.php"><button>Kelola Pembeli</button></a>
        <a href="kurir.php"><button>Kelola Kurir</button></a>
    </nav>
    <br><br>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Nama Pembeli</th>
                <th>Nama Kurir</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && mysqli_num_rows($result) > 0) { ?>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']); ?></td>
                        <td><?= htmlspecialchars($row['nama_brg']); ?></td>
                        <td><?= htmlspecialchars($row['nama_pembeli']); ?></td>
                        <td><?= htmlspecialchars($row['nama_kurir']); ?></td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="4" style="text-align: center;">Tidak ada data dengan ID yang sama di ketiga tabel (Barang, Pembeli, Kurir).</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>

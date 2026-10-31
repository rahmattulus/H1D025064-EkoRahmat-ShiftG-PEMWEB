<?php
require_once __DIR__.'/../koneksi.php';
// include('koneksi.php');
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($koneksi, "UPDATE pengguna SET username='$username', password='$password' WHERE id=$id");

    header("Location:index.php");
}

$id = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id=$id");
while ($data = mysqli_fetch_array($result)) {
    $username = $data['username'];
    $password = $data['password'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
</head>

<body>
    <span><a href="index.php">
            < </a></span>
    <h1>UPDATE data DB</h1>
    <form action="update.php" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td>
                    <input type="text" name="username" value="<?= $username; ?>">
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="text" name="password" value="<?= $password; ?>">
                </td>
            </tr>
            <tr>
                <td> <input type="hidden" name="id" value="<?= $_GET['id'];  ?>"> </td>
                <td> <input type="submit" name="update" value="Update"> </td>
            </tr>
        </table>
    </form>
</body>

</html>
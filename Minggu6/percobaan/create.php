<?php
require_once __DIR__.'/../koneksi.php';
// include('koneksi.php');
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = mysqli_query($koneksi, "INSERT INTO pengguna(username, password) VALUES('$username', '$password')");

        header("Location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Data</title>
</head>
<body>
    <h1>Input data ke DB</h1>
    <form action="create.php" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td>
                    <input type="text" name="username" id="">
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="password" id="">
                </td>
            </tr>
            <tr><td> <input type="submit" name="submit" value="Simpan"> </td></tr>
        </table>
    </form>
</body>
</html>
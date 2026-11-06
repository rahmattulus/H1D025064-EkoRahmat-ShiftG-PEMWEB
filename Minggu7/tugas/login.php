<?php
    session_start();

    $data = [
        ["Rahmat", "pass123"],
        ["Tullus", "123"],
        ];
    
    if(isset($_POST['Login'])){
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        $konfirm = "";

        if(in_array([$nama, $password], $data)){
            session_regenerate_id(true);
            $_SESSION['nama'] = $nama;
            $_SESSION['login'] = true;

            header("Location:index.php");
        }else{
            $konfirm = "Username atau Password salah!!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tugas | SESSION</title>
</head>
<body>
    <h2>Login Akun</h2>
    <p> <?= $konfirm ?? $_GET['konfirm'] ?? "";?> </p>

    <form method="post">
        <div>
            <label for="nama">Nama: </label> <br>
            <input type="text" name="nama">
        </div>
        <div>
            <label for="nama">Password: </label> <br>
            <input type="password" name="password">
        </div><br>
        <input type="submit" name="Login" value="Login">
    </form>

</body>
</html>
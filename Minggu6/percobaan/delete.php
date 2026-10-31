<?php
    session_start();
    require_once __DIR__.'/../koneksi.php';

    $id = $_GET['id'];
    $stmt = mysqli_query($koneksi, "DELETE from pengguna where id=$id");

    header("Location:index.php");
?>
<?php
    session_start();
    $set = $_GET['set'];
    $_SESSION['username'] = $set;
    // $_SESSION['username'] = 'Rahmat';
    header("Location:index.php");
?>
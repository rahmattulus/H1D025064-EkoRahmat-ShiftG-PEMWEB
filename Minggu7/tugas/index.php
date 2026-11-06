<?php
    session_start();
    if($_SESSION['login'] != true){
        header("Location:login.php");
    }

    $timeout = 10;
    if(isset($_SESSION['akses'])){
        $durasi = time() - $_SESSION['akses'];
        if($durasi > $timeout){
            session_unset();
            session_destroy();
            header("Location:login.php?konfirm=Sesi Telah Berakhir");
            exit();
        }
    }
    $_SESSION['akses']=time();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index - Tugas | SESSION</title>
</head>
<body>
    <h2>Hallo <?= $_SESSION['nama'] ?> </h2>
    <b>Sesi akan berakhir dalam: <span id="timer">10</span> detik</b>

    <script>
        // Ambil nilai sisa waktu (dalam detik)
        let sisaWaktu = <?= $timeout ?>; 
        const timerElement = document.getElementById('timer');

        const countdown = setInterval(() => {
            sisaWaktu--;
            timerElement.textContent = sisaWaktu;

            if (sisaWaktu <= 0) {
                clearInterval(countdown);
                // Redirect otomatis ke halaman login saat waktu habis
                window.location.href = "login.php?konfirm=Sesi Telah Berakhir";
            }
        }, 1000);
    </script>
</body>
</html>


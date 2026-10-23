<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan</title>
</head>
<body>
    <?php 
        $mahasiswa = [
            ["Romi","Bogor",22],
            ["Anto","Depok",23],
            ["Putri","Bangka",21],
        ];

        for($i= 0; $i < 3; $i++){
            echo $mahasiswa[$i][0]."<br> Asal ".$mahasiswa[$i][1]."<br> Umur ". $mahasiswa[$i][2]." <br><br>";
        }
    ?>
</body>
</html>
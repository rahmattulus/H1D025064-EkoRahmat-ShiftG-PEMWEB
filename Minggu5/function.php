<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Percobaan 4 - Function & statement</title>
</head>
<body>
    <?php 
        function text(){
            echo "Hello world! <br><br>";
        }
        text();

        function olahraga($sport){
            echo "Saya bermain $sport <br>";
        }
        olahraga("Sepak Bola");
        olahraga("basket");
        olahraga("voli");
        olahraga("badminton");
        olahraga("golf");

        function penjumlahan(int $a, int $b){
            return $a + $b;
        }
        echo penjumlahan(10,5)."<br>";

        function tambahdua(&$value){
            $value +=2;
        }
        $num = 4;
        tambahdua($num);
        echo $num ."<br>";

        function lahir(&$bulan){
            switch ($bulan) {
                case 'Januari':
                    echo "Anda lahir di bulan Januari";
                    break;
                case 'Februari':
                    echo "Anda lahir di bulan Februari";
                    break;
                case 'Maret':
                    echo "Anda lahir di bulan Maret";
                    break;
                default:
                    echo "Bulan kelahiran anda buka Januari, Februari ataupun maret";
                    break;
            }
        }
        $bulan = "November";
        lahir($bulan);
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas - Kalkulator PHP</title>
</head>

<body>
    <h2>Kalkulator</h2>
    <form method="post">
        <input type="number" name="angka1" placeholder="Angka ke-1" value="<?= $_POST['angka1'] ?? '' ?>" required>
        <input type="number" name="angka2" placeholder="Angka ke-2" value="<?= $_POST['angka2'] ?? '' ?>" required>
        <br><br>
        <!-- <select name="operator" id="">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="÷">÷</option>
            <option value="×">×</option>
        </select> -->
        <select name="operator" id="">
            <option value="+" <?= (($_POST['operator'] ?? '') == '+') ? 'selected' : '' ?>>+</option>
            <option value="-" <?= (($_POST['operator'] ?? '') == '-') ? 'selected' : '' ?>>-</option>
            <option value="÷" <?= (($_POST['operator'] ?? '') == '÷') ? 'selected' : '' ?>>÷</option>
            <option value="×" <?= (($_POST['operator'] ?? '') == '×') ? 'selected' : '' ?>>×</option>
        </select>

        <input type="submit" value="Hitung" name="hitung">
    </form>
    <br>
    <?php
    if( $_POST ) {
        $val1 = $_POST["angka1"];
        $val2 = $_POST["angka2"];
        $operator = $_POST["operator"];
        $hasil = "-";
        switch ($operator) {
            case '+':
                $hasil = $val1 + $val2;
                break;
            case '-':
                $hasil = $val1 - $val2;
                break;
            case '×':
                $hasil = $val1 * $val2;
                break;
            case '÷':
                if($val2 == 0){$hasil = "Hasil pembagian tidak terdefinisikan";}
                else{$hasil = $val1 / $val2;}
                break;
        }
        echo "<p>Hasil Perhitungan: $val1 $operator $val2 = $hasil  </p>";
    }
    ?>
</body>

</html>
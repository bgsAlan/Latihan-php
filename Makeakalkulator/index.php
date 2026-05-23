<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
</head>
<body>
    <!-- Membuat inputan angka oleh user -->
     <form action="" method="POST">
        <label>
            Angka pertama:
            <input type="number" name="angka-pertama" step="any" required>
        </label>
        <br>
        <label>
            Operasi Matematika: 
            <select name="operasi" id="operasi">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
                <option value="%">%</option>
            </select>
        </label>
        <br>
        <label>
            Angka Kedua:
            <input type="number" name="angka-kedua" step="any" required>
        </label>
        <br> 
        <button type="submit" name="submit">Hitung</button>
     </form>

     <!-- Logic Kalkulator -->
      <?php 
      if(isset($_POST["submit"])) {
        $angka_pertama = $_POST["angka-pertama"];
        $angka_kedua = $_POST["angka-kedua"];
        $operasi = $_POST["operasi"];

        switch ($operasi) {
            case '+':
                $hasil = $angka_pertama + $angka_kedua;
                break;
            case '-':
                $hasil = $angka_pertama - $angka_kedua;
                break;
            case '*':
                $hasil = $angka_pertama * $angka_kedua;
                break;
            case '/':
                if($angka_kedua == 0) {
                   $hasil = "Tak terdifinisi";
                }else {
                    $hasil = $angka_pertama / $angka_kedua;
                }
                break;
            case '%':
                $hasil = $angka_pertama % $angka_kedua;
                break;
        }
        echo "<h3> Hasil perhitungan dari $angka_pertama $operasi $angka_kedua = $hasil </h3>";
      }
      ?>
</body>
</html>
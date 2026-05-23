<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi berat</title>
</head>
<body>
     <a href="convert-suhu.php">|Konversi suhu|</a>
     <a href="convert-panjang.php">|Konversi satuan panjang|</a>
    <!-- User memasukkan berat yang mau di rubah default gram -->
     <form action="" method="post">
        <label>
            Masukkan angka (g):
            <input type="number" name="angka-g" step="any" required>
        </label>
        <br>
        <label>
            Konversi ke satuan:
            <select name="con-satuan" id="con-satuan">
            <option value="kg">kg</option>
            <option value="mg">mg</option>
            <option value="pound">pound</option>
            </select>
        </label>
        <br>
        <button type="submit" name="submit">Konversi</button>
     </form>

     <!-- Logic -->
      <?php 
    if(isset($_POST["submit"])) {
        //   Ambil inputan user
    $angka_con = $_POST["angka-g"];
    // Ambil dropdown
    $conver = $_POST["con-satuan"];

    $hasil = 0;
        switch ($conver) {
            case 'kg':
                $hasil = $angka_con / 1000;
                break;
            case 'mg':
                $hasil = $angka_con * 1000;
                break;
            case 'pound':
                $hasil = $angka_con * 453.6;
                break;
        }
                echo "Hasil konversi dari $angka_con g ke $conver = $hasil $conver";
    }
      ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi panjang</title>
</head>
<body>
     <a href="convert-suhu.php">|Konversi suhu|</a>
    <!-- User memasukkan panjang yang mau di rubah default cm -->
     <form action="" method="post">
        <label>
            Masukkan angka (m):
            <input type="number" name="angka-m" step="any" required>
        </label>
        <br>
        <label>
            Konversi ke satuan:
            <select name="con-satuan" id="con-satuan">
            <option value="km">km</option>
            <option value="cm">cm</option>
            <option value="mm">mm</option>
            <option value="ft">ft</option>
            </select>
        </label>
        <br>
        <button type="submit" name="submit">Konversi</button>
     </form>

     <!-- Logic -->
      <?php 
    if(isset($_POST["submit"])) {
        //   Ambil inputan user
    $angka_con = $_POST["angka-m"];
    // Ambil dropdown
    $conver = $_POST["con-satuan"];

    $hasil = 0;
        switch ($conver) {
            case 'km':
                $hasil = $angka_con / 1000;
                break;
            case 'cm':
                $hasil = $angka_con * 100;
                break;
            case 'mm':
                $hasil = $angka_con * 1000;
                break;
            case 'ft':
                $hasil = $angka_con *  3.281;
                break;
        }
                echo "Hasil konversi dari $angka_con m ke $conver = $hasil $conver";
    }
      ?>
</body>
</html>
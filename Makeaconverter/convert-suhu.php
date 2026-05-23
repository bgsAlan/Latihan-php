<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Suhu</title>
</head>
   <a href="convert-panjang.php">|Konversi satuan panjang|</a>
    <!-- Pengguna menginput suhu dalam celcius lalu akan muncul hasil perubahannya -->
    <h2>Konversi Suhu Celcius</h2>
    <form action="" method="POST">
        <label>
            Masukkan nilai Celcius
            <input type="number" name="celcius-input" step="any" required>
            <button type="submit" name="submit">Konversi</button>
        </label>
    </form>

    <?php 
    //Logic
    //Cek apakah tombol submit ditekan
    if(isset($_POST["submit"])) {
        //Mengambil inputan dari user
        $celcius = $_POST["celcius-input"];

        //Mengkonversi inputan user ke suhu lain
        $fahrenheit = (9/5 * $celcius) + 32;
        $kelvin     = $celcius + 273.15;
        $reamur     = 4/5 * $celcius;

        //Menampilkan hasil konversi ke user
        echo "<h3>Hasil konversi dari $celcius  &deg;C:</h3>";
    
    ?>
        <table style="width: 50%;" border="1">
        <thead>
            <tr>
                <th style="width: 10%;">NO</th>
                <th style="width: 30%;">fahrenheit</th>
                <th style="width: 30%;">kelvin</th>
                <th style="width: 30%;">reamur</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1.</td>
                <td><?= $fahrenheit  ?>  &deg;F </td>
                <td><?= $kelvin ?>  &deg;K</td>
                <td><?= $reamur ?>  &deg;R</td>
            </tr>
        </tbody>
        </table>
    <?php } ?>
</body>
</html>
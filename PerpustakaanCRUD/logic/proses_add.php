<?php 
require ("../connect/connectdb.php");

$message = "";
$messageType = "";

//Cek apakah tombol submit sudah di
if(isset($_POST["submit"])) {

    //ambil semua var input
    $title = trim($_POST["judul-buku"]);
    $author = trim($_POST["pengarang-buku"]);
    $year = trim($_POST["tahun-terbit"]);
    $cover = trim($_POST["cover-jpg"]);
    
    //Cek apakah data buku sudah ada
    $sql_check = "SELECT COUNT(*) as total FROM books WHERE title = '$title'";

    //simpan di result
    $result = mysqli_query($conn,$sql_check);

    $data = mysqli_fetch_assoc($result);

    // jika buku sudah ada
    if($data["total"] > 0){

        $message = "Buku sudah ada di database!";
        $messageType = "warning";

    } else {

        // insert data
        $sql = "INSERT INTO books(title, author, cover, year)
                VALUES('$title', '$author', '$cover', '$year')";

        if(mysqli_query($conn, $sql)){

            $message = "Buku berhasil ditambahkan!";
            $messageType = "success";

        } else {

            $message = "Gagal menambahkan buku!";
            $messageType = "error";

        }
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-cyan-100 via-sky-50 to-blue-100 flex items-center justify-center p-6">

    <div class="w-full max-w-md">

        <!-- Notifikasi -->
        <?php if($message != "") : ?>

            <div class="
            mb-5 
            p-4 
            rounded-2xl 
            text-center 
            font-semibold
            shadow-lg

            <?php 
                if($messageType == 'success'){
                    echo 'bg-green-100 text-green-700 border border-green-300';
                } elseif($messageType == 'warning'){
                    echo 'bg-yellow-100 text-yellow-700 border border-yellow-300';
                } else {
                    echo 'bg-red-100 text-red-700 border border-red-300';
                }
            ?>
            ">
                <?= $message; ?>
            </div>

        <?php endif; ?>

        <!-- Card Form -->
        <form action="" method="POST" 
        class="bg-white shadow-2xl rounded-3xl p-8 border border-slate-200">

            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-slate-800">
                    Tambah Buku
                </h1>

                <p class="text-slate-500 mt-2 text-sm">
                    Tambahkan koleksi buku baru ke database
                </p>
            </div>

            <!-- Input Judul -->
            <div class="mb-5">
                <label class="block mb-2 font-semibold text-slate-700">
                    Judul Buku
                </label>

                <input 
                type="text" 
                name="judul-buku"
                required
                placeholder="Masukkan judul buku"
                class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:ring-4 focus:ring-cyan-200 focus:border-cyan-400 transition">
            </div>

            <!-- Input Pengarang -->
            <div class="mb-5">
                <label class="block mb-2 font-semibold text-slate-700">
                    Pengarang Buku
                </label>

                <input 
                type="text" 
                name="pengarang-buku"
                required
                placeholder="Masukkan nama pengarang"
                class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:ring-4 focus:ring-cyan-200 focus:border-cyan-400 transition">
            </div>

            <!-- Input Tahun -->
            <div class="mb-5">
                <label class="block mb-2 font-semibold text-slate-700">
                    Tahun Terbit
                </label>

                <input 
                type="number" 
                name="tahun-terbit"
                step="any"
                required
                placeholder="Contoh: 2024"
                class="w-full border border-slate-300 rounded-xl px-4 py-3 outline-none focus:ring-4 focus:ring-cyan-200 focus:border-cyan-400 transition">
            </div>

            <!-- Upload Cover -->
            <div class="mb-6">
                <label class="block mb-2 font-semibold text-slate-700">
                    Upload Cover
                </label>

                <input 
                type="file" 
                name="cover-jpg"
                required
                class="w-full border border-dashed border-slate-300 bg-slate-50 rounded-xl px-4 py-3 cursor-pointer">

                <p class="text-xs text-slate-500 mt-2">
                    Ekstensi yang diperbolehkan: .jpg / .png
                </p>
            </div>

            <!-- Button -->
            <div class="flex gap-3">

                <button 
                type="submit" 
                name="submit"
                class="w-full bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-3 rounded-xl transition duration-300 shadow-lg hover:shadow-cyan-300">
                    Tambah Buku
                </button>

                <a href="../"
                class="w-full bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold py-3 rounded-xl transition duration-300 text-center">
                    Kembali
                </a>

            </div>

        </form>
    </div>

</body>
</html>
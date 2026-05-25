<?php 
include ("../connect/connectdb.php");
//Cek apakah ada judul yang dikirimkan lewat url
if(isset($_GET['search'])) {
    $title = $_GET['search'];

    //Check query
    $sql = "SELECT * FROM books WHERE title = '$title';";
    $result = mysqli_query($conn,$sql);
     // ubah jadi array
    $book = mysqli_fetch_assoc($result);
    

   ?>

    
    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Buku</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-xl shadow">

    <h1 class="text-2xl font-bold mb-5">Hasil Search Buku</h1>

    <img
        src="../img/<?= $book['cover']; ?>"
        class="w-full h-72 object-cover rounded-lg mb-5"
    >

    <form method="POST">

        <div class="mb-4">
            <label class="block mb-1">Judul</label>

            <input
                type="text"
                name="title"
                value="<?= $book['title']; ?>"
                class="w-full border p-2 rounded"
                readonly
            >
        </div>

        <div class="mb-4">
            <label class="block mb-1">Author</label>

            <input
                type="text"
                name="author"
                value="<?= $book['author']; ?>"
                class="w-full border p-2 rounded"
                readonly
            >
        </div>

        <div class="mb-4">
            <label class="block mb-1">Tahun</label>

            <input
                type="number"
                name="year"
                value="<?= $book['year']; ?>"
                class="w-full border p-2 rounded"
                readonly
            >
        </div>
    </form>
           <a href="../"
                class="w-full bg-blue-200 hover:bg-blue-300 text-white-700 font-semibold py-3 rounded-xl transition duration-300 text-center p-1">
                    Kembali
                </a>

</div>
    <?php }else {
        echo "Buku Tidak Ditemukan";
    } ?>



 



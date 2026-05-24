<?php
require ("connect/connectdb.php");
$result = mysqli_query($conn, "SELECT * FROM books");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <nav class="bg-blue-600 text-white p-4 shadow-lg">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold"> Perpustakaan</h1>

            <a href="logic/proses_add.php" class="bg-white text-blue-600 px-4 py-2 rounded-lg font-semibold hover:bg-gray-200 transition">
                + Tambah Buku
            </a>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto p-6">

        <h2 class="text-3xl font-bold mb-6 text-gray-800">
            Daftar Buku
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            <?php while($book = mysqli_fetch_assoc($result)) : ?>

                <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:scale-105 transition duration-300">

                    <img
                        src="img/<?= $book['cover']; ?>"
                        alt="<?= $book['title']; ?>"
                        class="w-full h-72 object-cover"
                    >

                    <div class="p-4">

                        <h3 class="text-xl font-bold text-gray-800 mb-2 line-clamp-1">
                            <?= $book['title']; ?>
                        </h3>

                        <p class="text-gray-600 mb-1">
                            Penulis: <?= $book['author']; ?>
                        </p>

                        <p class="text-gray-500 mb-4">
                            Tahun terbit:  <?= $book['year']; ?>
                        </p>

                        <div class="flex gap-2">

                            <a
                                href="edit.php?id=<?= $book['id']; ?>"
                                class="flex-1 bg-yellow-400 text-center py-2 rounded-lg font-semibold hover:bg-yellow-500 transition"
                            >
                                Edit
                            </a>

                            <a
                                href="logic/proses_delete.php?id=<?= $book['id']; ?>"
                                onclick="return confirm('Yakin mau hapus buku ini?')"
                                class="flex-1 bg-red-500 text-white text-center py-2 rounded-lg font-semibold hover:bg-red-600 transition"
                            >
                                Hapus
                            </a>

                        </div>

                    </div>
                </div>

            <?php endwhile; ?>

        </div>

    </div>

</body>
</html>

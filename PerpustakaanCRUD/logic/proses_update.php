<?php 
include ("../connect/connectdb.php");
//Cek apakah ada id yang dikirimkan lewat url
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    //Check query
    $sql = "SELECT * FROM books WHERE id = '$id';";
    $result = mysqli_query($conn,$sql);
     // ubah jadi array
    $book = mysqli_fetch_assoc($result);

} else {
    echo "ID tidak ditemukan";
    exit;
}
// proses update
if(isset($_POST['update'])) {

    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];

    $update = "UPDATE books 
               SET 
               title = '$title',
               author = '$author',
               year = '$year'
               WHERE id = $id";

    $query = mysqli_query($conn, $update);

    if($query) {
        echo "
        <script>
            alert('Data berhasil diupdate');
            window.location.href = '../index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal diupdate');
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Buku</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-xl shadow">

    <h1 class="text-2xl font-bold mb-5">Update Buku</h1>

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
            >
        </div>

        <div class="mb-4">
            <label class="block mb-1">Author</label>

            <input
                type="text"
                name="author"
                value="<?= $book['author']; ?>"
                class="w-full border p-2 rounded"
            >
        </div>

        <div class="mb-4">
            <label class="block mb-1">Tahun</label>

            <input
                type="number"
                name="year"
                value="<?= $book['year']; ?>"
                class="w-full border p-2 rounded"
            >
        </div>

        <button
            type="submit"
            name="update"
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
        >
            Update
        </button>

    </form>

</div>

</body>
</html>
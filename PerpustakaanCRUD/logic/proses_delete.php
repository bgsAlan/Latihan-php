<?php
require ("../connect/connectdb.php");

//Cek apakah ada data yang dikirim di GET
if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    //Delete query
    $sql = "DELETE FROM books WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);

    if($result) {
        echo "<script>
                    alert('Buku berhasil dihapus');
                    window.location.href = '../index.php'; 
                  </script>";
        } else {
            // Kalau gagal eksekusi
            echo "<script>
                    alert('Gagal hapus data, coba lagi deh!');
                    window.location.href = '../index.php';
                  </script>";
        }
    }
else {
    header("Location: ../index.php");
    exit;
}
    




?>
<?php
include('koneksi.php');
$id_buku = $_POST['id_buku'];
$judul_buku = $_POST['judul_buku'];
$penerbit = $_POST['penerbit'];
$pengarang = $_POST['pengarang'];
$tahun_terbit = $_POST['tahun_terbit'];
$jumlah_buku =$_POST['jumlah_buku'];
$query = "INSERT INTO tb_buku (id_buku,  judul_buku, penerbit, pengarang, tahun_terbit, jumlah_buku) 
          VALUES ('$id_buku', '$judul_buku', '$penerbit', '$pengarang', '$tahun_terbit', '$jumlah_buku')";
if (mysqli_query($conn, $query)) {
    header("location: buku.php");
} else {
    echo "ERROR, tidak berhasil " . mysqli_error($conn);
}
mysqli_close($conn);
?>

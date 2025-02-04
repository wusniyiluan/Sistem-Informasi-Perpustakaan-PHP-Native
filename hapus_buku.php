<?php 

$id = $_GET['id'];

//include(dbconnect.php);
include('koneksi.php');

//query hapus
$query = "DELETE FROM tb_buku WHERE id_buku = '$id' ";

if (mysqli_query($conn , $query)) {
	# redirect ke index.php
	// header("location:buku.php");
	echo "<script>alert('Data Berhasil Dihapus');window.location='buku.php';</script>";
}
else{
	echo "ERROR, data gagal dihapus". mysqli_error($conn);
}

mysqli_close($conn);
?>
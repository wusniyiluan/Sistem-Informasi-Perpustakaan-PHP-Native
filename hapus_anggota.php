<?php 
$id = $_GET['id'];
//include(dbconnect.php);
include('koneksi.php');
//query hapus
$query = "DELETE FROM tb_anggotaa WHERE nis = '$id' ";

if (mysqli_query($conn , $query)) {
	# redirect ke index.php
	// header("location:anggota.php");
	echo "<script>alert('Data Berhasil Dihapus');window.location='anggota.php';</script>";

}
else{
	echo "ERROR, data gagal dihapus". mysqli_error($conn);
}
mysqli_close($conn);
?>
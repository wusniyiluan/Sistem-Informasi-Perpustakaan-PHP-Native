<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "perpustakaansdkrendetan"; // nama database yanga ada di my sql
$conn = mysqli_connect($host, $user, $password, $dbname);

// cek kondisi berhasil terhubung atau tidak
if(!$conn){
	die("Eror, tidak ada koneksi");// jika gagal 
}

?>
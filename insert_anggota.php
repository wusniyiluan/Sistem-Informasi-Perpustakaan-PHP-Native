<?php
include('koneksi.php'); 
$nis = $_POST['nis'];
$nama_anggota = $_POST['nama_anggota'];
$alamat = $_POST['alamat'];
$jenkel = $_POST['jenkel'];
$kelas = $_POST['kelas'];
$checkQuery = "SELECT nis FROM tb_anggotaa WHERE nis = '$nis'";
$result = mysqli_query($conn, $checkQuery); 
if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('NIS Yang Dimasukkan Sudah Terdaftar');window.location='anggota.php';</script>";
} else {
    $query = "INSERT INTO tb_anggotaa (nis, nama_anggota, alamat, jenkel, kelas) 
              VALUES ('$nis', '$nama_anggota', '$alamat', '$jenkel', '$kelas')";

    if (mysqli_query($conn, $query)) { 
        echo "<script>alert('Data Berhasil Ditambahkan');window.location='anggota.php';</script>";
    } else {
        echo "ERROR: Data tidak berhasil ditambahkan. " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>

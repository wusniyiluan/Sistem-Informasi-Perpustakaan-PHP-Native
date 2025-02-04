<?php
include('koneksi.php');
$id_transaksi      = $_POST['id_transaksi'];
$id_buku        = $_POST['id_buku'];
$nis            = $_POST['nis'];
$tgl_pinjam     = $_POST['tgl_pinjam'];
$tgl_kembali    = $_POST['tgl_kembali'];
$status         = $_POST['status'];

$queryCekStok = "SELECT jumlah_buku FROM tb_buku WHERE id_buku = '$id_buku'";
$resultCekStok = mysqli_query($conn, $queryCekStok);
$row = mysqli_fetch_assoc($resultCekStok);
$jumlah_buku = $row['jumlah_buku'];
if ($status == 'pinjam') {
    if ($jumlah_buku > 0) {
        $query = "INSERT INTO tb_transaksi (id_transaksi, id_buku, nis, tgl_pinjam, tgl_kembali, status) 
                  VALUES ('$id_transaksi', '$id_buku', '$nis', '$tgl_pinjam', '$tgl_kembali', '$status')";
        if (mysqli_query($conn, $query)) {
            $updateBuku = "UPDATE tb_buku SET jumlah_buku = jumlah_buku - 1 WHERE id_buku = '$id_buku'";
            if (mysqli_query($conn, $updateBuku)) {
                header("location: transaksi.php");
            } else {
                echo "ERROR, gagal memperbarui jumlah buku: " . mysqli_error($conn);
            }
        } else {
            echo "ERROR, tidak berhasil: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('Stok Buku Habis, Transaksi, tidak dapat dilakukan, silahkan tambahkan stok buku dulu.');window.location='tambah_buku.php';</script>";
    }
}
mysqli_close($conn); 
?>

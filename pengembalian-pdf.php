<?php
require_once __DIR__ . '/vendor/autoload.php'; // Memuat library mPDF
include('koneksi.php'); // Memuat koneksi ke database

// Query data dari database
$transaksi = $conn->query("SELECT * FROM tb_transaksi INNER JOIN tb_buku ON tb_transaksi.id_buku = tb_buku.id_buku 
INNER JOIN tb_anggotaa ON tb_transaksi.nis = tb_anggotaa.nis 
WHERE status = 'kembali' ORDER BY id_transaksi ASC") or die(mysqli_error($conn));;

// Inisialisasi mPDF
$mpdf = new \Mpdf\Mpdf();

// Membuat HTML untuk PDF
$html = '
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Transaksi Pengembalian</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2  style="text-align: center;">Laporan Pengembalian</h2>
    <h2  style="text-align: center;">Perpustakaan </h2>
    <h2  style="text-align: center;">SD Negeri Krendetan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Transaksi</th>
                <th>Nama</th>
                <th>ID Buku</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>';

// Menambahkan data ke tabel
$no = 1;
while ($row = $transaksi->fetch_assoc()) {
    $html .= '
        <tr>
            <td>' . $no++ . '</td>
            <td>' . $row['id_transaksi'] . '</td>
            <td>' . $row['nama_anggota'] . '</td>
            <td>' . $row['id_buku'] . '</td>
            <td>' . $row['judul_buku'] . '</td>
            <td>' . $row['tgl_pinjam'] . '</td>
            <td>' . $row['tgl_kembali'] . '</td>
            <td>' . $row['status'] . '</td>
        </tr>';
}

$html .= '
        </tbody>
    </table>
    <br><br>
    <div class="tanda-tangan">
        <div style="width:200px;float:right">
            Purworejo, ' . date('d - m - Y') . '<br />
            Kepala SD N Krendetan
            <br><br><br>
            <br>
            <br>
            <p>................................................<br />
        </div>
        <div style="clear:both"></div>
    </div>
</body>
</html>';

// Menulis HTML ke PDF
$mpdf->WriteHTML($html);

// Output PDF ke browser
$mpdf->Output('Laporan-Pengembalian.pdf', 'I'); // 'I' untuk menampilkan di browser
?>

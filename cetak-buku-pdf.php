<?php
require_once __DIR__ . '/vendor/autoload.php'; // Memuat library mPDF
include('koneksi.php'); // Memuat koneksi ke database

// mengambil data dari tb_buku pada database perpustakaansdkrendetan
$databuku = $conn->query("SELECT * FROM tb_buku ORDER BY id_buku     ASC") or die(mysqli_error($conn));


// Inisialisasi mPDF
$mpdf = new \Mpdf\Mpdf();

// Membuat HTML untuk PDF
$html = '
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Buku Perpustakaan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2  style="text-align: center;">Laporan Data Buku</h2>
    <h2  style="text-align: center;">Perpustakaan </h2>
    <h2  style="text-align: center;">SD Negeri Krendetan</h2>
    <table>
        <thead>
                <tr>
                        <th>No</th>
                        <th><center>ID BUKU</center></th>
                        <th>Judul</th>
                        <th>Penerbit</th>
                        <th>Pengarang</th>
                        <th><center>Tahun Terbit</center></th>
                        <th><center>Jumlah Buku</center></th>
                    </tr>
        </thead>
        <tbody>';

// Menambahkan data ke tabel
$no = 1;
while ($row = $databuku->fetch_assoc()) {
    $html .= '
        <tr>
            <td>' . $no++ . '</td>
            <td>' . $row['id_buku'] . '</td>
            <td>' . $row['judul_buku'] . '</td>
            <td>' . $row['penerbit'] . '</td>
            <td>' . $row['pengarang'] . '</td>
            <td>' . $row['tahun_terbit'] . '</td>
            <td>' . $row['jumlah_buku'] . '</td>
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
$mpdf->Output('Laporan Data Buku.pdf', 'I'); // 'I' untuk menampilkan di browser
?>

<?php
require_once __DIR__ . '/vendor/autoload.php'; // Memuat library mPDF
include('koneksi.php'); // Memuat koneksi ke database

// mengambil data dari tb_buku pada database perpustakaansdkrendetan
$dataanggota = $conn->query("SELECT * FROM tb_anggotaa ORDER BY nis ASC") or die(mysqli_error($conn));


// Inisialisasi mPDF
$mpdf = new \Mpdf\Mpdf();

// Membuat HTML untuk PDF
$html = '
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Anggota Perpustakaan</title>
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
                        <th><center>NIS Anggota</center></th>
                        <th>Nama Anggota</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th><center>Kelas / unit</center></th>
                    </tr>
        </thead>
        <tbody>';

// Menambahkan data ke tabel
$no = 1;
while ($row = $dataanggota->fetch_assoc()) {
    $html .= '
        <tr>
            <td>' . $no++ . '</td>
            <td>' . $row['nis'] . '</td>
            <td>' . $row['nama_anggota'] . '</td>
            <td>' . $row['alamat'] . '</td>
            <td>' . $row['jenkel'] . '</td>
            <td>' . $row['kelas'] . '</td>
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
$mpdf->Output('Laporan Anggota Perpustakaan.pdf', 'I'); // 'I' untuk menampilkan di browser
?>

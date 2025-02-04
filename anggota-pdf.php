<?php
//tambahkan dbconnect
include('koneksi.php');
// menampilkan DB anggota
$dataanggota = $conn->query("SELECT * FROM tb_anggotaa ORDER BY nis ASC") or die(mysqli_error($conn));
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Data Anggota Perpustakaan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="img/log.png">
</head>

<body>
    <style type=”text/css”>
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;
        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }

        .tengah {
            text-align: center;
        }
    </style>

    <div class="container mt-3">
        <table width="80%" border="0" align="center">
            <tr>
                <td width="100" align="center"><img src="img/log.png" width="170" height="163"></td>
                <td width="526">
                    <h3 align="center"><strong>PERPUSTAKAAN </strong></h3>
                    <h3 align="center"><strong>SD NEGERI KRENDETAN </strong></h3>
                </td>
            </tr>
        </table>
        <br><br>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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

                <tbody>
                    <?php

                    $no = 1;

                    ?>
                    <?php foreach ($dataanggota as $key) :

                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><center><?= $key['nis']; ?></center></td>
                            <td><?= $key['nama_anggota']; ?></td>
                            <td><?= $key['alamat']; ?></td>
                            <td><?= $key['jenkel']; ?></td>
                            <td><center><?= $key['kelas']; ?></center></td>

                        <?php endforeach; ?>
                </tbody>
            </table>
            <div>
                <div style="width:200px;float:right">
                    Purworejo,
                    <?php echo date('d - m - y'); ?>
                    <br />Kepala SD N Krendetan
                    <br><br><br>
                    <br>
                    <br>
                    <!-- <p>      Mansur Yusuf,S.Pd.SD</p>
                    <p>NIP. 19870618 200902 1 002</p> -->
                    <p>................................................<br />
                </div>
                <div style="clear:both"></div>
            </div>

            <script>
                window.print();
            </script>
        </div>
    </div>
</body>
</html>
<?php
include('koneksi.php');
require_once('function.php');
$transaksi = $conn->query("SELECT * FROM tb_transaksi INNER JOIN tb_buku ON tb_transaksi.id_buku = tb_buku.id_buku 
INNER JOIN tb_anggotaa ON tb_transaksi.nis = tb_anggotaa.nis 
WHERE status = 'pinjam' ORDER BY id_transaksi ASC") or die(mysqli_error($conn));;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laporan Transaksi Peminjaman </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" href="img/log.png">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-text mx-3">Admin <sup>Perpustakaan</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                MENU DATA ANGGOTA
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="anggota.php">
                    <img src="img/anggota.svg" width="7%" style="filter:invert(1);">
                    <span>Data Anggota</span>
                </a>
            </li>
            <div class="sidebar-heading">
                MENU DATA BUKU DAN TRANSAKSI
            </div>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="buku.php" aria-expanded="true" aria-controls="collapseUtilities">
                    <img src="img/book.svg" width="7%" style="filter:invert(1);">
                    <span>Data Buku</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="transaksi.php" aria-expanded="true" aria-controls="collapseUtilities">
                    <img src="img/list.svg" width="7%" style="filter:invert(1);">
                    <span>Transaksi</span>
                </a>
            </li>
            <li class="nav-item">
                <!-- <a class="nav-link collapsed" href="laporan.php" aria-expanded="true" aria-controls="collapseUtilities"> -->
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">

                    <img src="img/book.svg" width="8%" style="filter:invert(1);">
                    <span>Laporan</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="laporan-data-anggota.php">Laporan Data Anggota</a>
                        <a class="collapse-item " href="laporan-data-buku.php">Laporan Data Buku</a>
                        <a class="collapse-item " href="laporan-transaksi-peminjaman.php">Laporan Peminjaman</a>
                        <a class="collapse-item " href="laporan-transaksi-pengembalian.php">Laporan Pengembalian</a>
                    </div>
                </div>
            </li>
            <div class="sidebar-heading">
                KELUAR
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="logout.php">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>LOGOUT</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <marquee behavior="scroll" direction="right">
                        <h4>Perpustakaan SD Negeri Krendetan </h4>
                    </marquee>
                </nav>
                <!-- End of Topbar -->
                <h3>
                    <center>Laporan Peminjaman  </center>
                    <center> Perpustakaan SD N Krendetan </center>
                </h3>
                <br>
                <!-- Isi Content -->

                <div class="container-fluid">

                    <?php
                    $transaksia = $conn->query("SELECT * FROM tb_transaksi INNER JOIN tb_buku ON tb_transaksi.id_buku = tb_buku.id_buku 
                INNER JOIN tb_anggotaa ON tb_transaksi.nis = tb_anggotaa.nis 
                WHERE status = 'kembali' ORDER BY id_transaksi ASC") or die(mysqli_error($conn));

                    ?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Data Transaksi Peminjaman Buku</h6>
                        </div>
                        <div class="card-body">
                            <div class="float-left">
                                Cetak data : <a href="peminjaman-pdf.php" target="_blank" class="btn btn-primary" onclick="return confirm('Cetak Laporan Data Peminjaman?')"><i class="fa fa-file-pdf-o">Cetak</i> </a>
                            </div>
                            <br>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><center>No</center></th>
                                            <th><center>ID Transaksi</center></th>
                                            <th><center>Nama</center></th>
                                            <th><center>ID Buku</center></th>
                                            <th><center>Judul</center></th>
                                            <th><center>Tanggal Pinjam</center></th>
                                            <th><center>Tanggal Kembali</center></th>
                                            <th>Terlambat</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($transaksi as $pecah) :
                                        ?>
                                            <tr>
                                                <td><center><?= $no++; ?></center></td>
                                                <td><center><?= $pecah['id_transaksi']; ?></center></td>

                                                <td><?= $pecah['nama_anggota']; ?></td>
                                                <td><center><?= $pecah['id_buku']; ?></center></td>
                                                <td><?= $pecah['judul_buku']; ?></td>
                                                <td><center><?= $pecah['tgl_pinjam']; ?></center></td>
                                                <td><center><?= $pecah['tgl_kembali']; ?></center></td>
                                                <td>
                                                    
                                                    <?php
                                                    $denda = 1000; // setiap ketelambatan /harinya dihitung denda 1.000
                                                    $tgl_dateline = $pecah['tgl_kembali']; // variabel tgl_date line diambil dari array $pecah
                                                    $tgl_kembali = date('d-m-Y');

                                                    $lambat = terlambat($tgl_dateline, $tgl_kembali); //memanggil function terlambat dari file function.php 
                                                    //yang diasumsilan menjadi variable $lambat untuk menghitung jumlah hari keterlambatan
                                                    $denda1 = $lambat * $denda; // menghitung jumlah hari keterlambatan 

                                                    if ($lambat > 0) { ?> <!-- jika jumlah hari keterlambatan lebih dari 0 denda akan ditampilkan dan dihitung-->
                                                        <div style='color:red;'><?= $lambat ?> hari<br> (Rp. <?= number_format($denda1) ?>)</div> <!-- number format merupakan pemisah ribuan-->
                                                    <?php
                                                    } else {
                                                        echo $lambat . " Hari"; // menampilkan jumlah keterlambatan, jika tidak ada keterlambatan maka akan menampilkan 0hari 
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $pecah['status']; ?></td>
                                            </tr>
                                        <?php
                                        //  }
                                        endforeach;
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Perpustakaan SD N Krendetan</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    
</body>

</html>
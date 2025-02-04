<?php
include('koneksi.php');
require_once 'function.php';
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
  <title>Peminjaman Buku</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="icon" href="img/log.png">
</head>
<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-text mx-3">Admin <sup>Perpustakaan</sup></div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        MENU DATA ANGGOTA
      </div>
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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <img src="img/book.svg" width="8%" style="filter:invert(1);">
          <span>Laporan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
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
      <hr class="sidebar-divider d-none d-md-block">
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <marquee behavior="scroll" direction="right">
            <h4>Perpustakaan SD Negeri Krendetan </h4>
          </marquee>
        </nav>
        </pre>
        <div class="container-fluid">
          <h1 class="mt-4">Data Transaksi</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active">data transaksi</li>
          </ol>
          <div class="col-md-12">
            <a href="tambah_transaksi.php" class="btn btn-primary mb-3"><i class="fa fa-plus" onclick="return confirm('Tambah Transaksi Peminjaman ?')"></i> Tambah Transaksi </a>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Data Transaksi Peminjaman</h6>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <input type="text" name="cari" size="25" placeholder="Search...." autofocus autocomplete="off">
                <input type="submit" class="btn btn-secondary" value="Cari">
              </form>
              <br>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th><center>ID Transaksi</center></th>
                      <th><center>Nama Peminjam</center></th>
                      <th><center>ID Buku</center></th>
                      <th><center>Judul</center></th>
                      <th> <center>Tanggal Pinjam</center></th>
                      <th><center>Tanggal Kembali</center> </th>
                      <th>Terlambat</th>
                      <th>Status</th>
                      <th><center>Aksi</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (isset($_POST['cari'])) {
                      $cari = htmlspecialchars($_POST['cari']); 
                      $transaksi = $conn->query("SELECT * FROM tb_transaksi 
                              INNER JOIN tb_buku ON tb_transaksi.id_buku = tb_buku.id_buku 
                              INNER JOIN tb_anggotaa ON tb_transaksi.nis = tb_anggotaa.nis 
                              WHERE status = 'pinjam' 
                              AND (nama_anggota LIKE '%$cari%')
                              ORDER BY id_transaksi ASC") or die(mysqli_error($conn));
                    } else {
                      $transaksi = $conn->query("SELECT * FROM tb_transaksi 
                              INNER JOIN tb_buku ON tb_transaksi.id_buku = tb_buku.id_buku 
                              INNER JOIN tb_anggotaa ON tb_transaksi.nis = tb_anggotaa.nis 
                              WHERE status = 'pinjam' 
                              ORDER BY id_transaksi ASC") or die(mysqli_error($conn));
                    }
                    $no = 1;
                    foreach ($transaksi as $pecah) :
                    ?>
                      <tr>
                        <td> <center><?= $no++; ?></center></td>
                        <td><center><?= $pecah['id_transaksi']; ?></center> </td>
                        <td><?= $pecah['nama_anggota']; ?></td>
                        <td><center><?= $pecah['id_buku']; ?></center></td>
                        <td><?= $pecah['judul_buku']; ?></td>
                        <td> <center><?= $pecah['tgl_pinjam']; ?></center></td>
                        <td><center><?= $pecah['tgl_kembali']; ?></center></td>
                        <td>
                          <?php
                          $denda = 1000; 
                          $tgl_dateline = $pecah['tgl_kembali']; 
                          $tgl_kembali = date('d-m-Y');
                          $lambat = terlambat($tgl_dateline, $tgl_kembali); 
                          $denda1 = $lambat * $denda; 
                          if ($lambat > 0) { ?> 
                            <div style='color:red;'><?= $lambat ?> hari<br> (Rp. <?= number_format($denda1) ?>)</div> 
                          <?php
                          } else {
                            echo $lambat . " Hari"; 
                          }
                          ?>
                        </td>
                        <td><?= $pecah['status']; ?></td>
                        <td>
                          <a href="kembalikan.php?id=<?php echo $pecah['id_transaksi']; ?> &judul=<?= $pecah['judul_buku']; ?>" class="btn btn-info btn-sm"><i onclick="return confirm('Kembalikan Buku yang Dipinjam?')">Kembali</i></a>
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
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Perpustakaan SD N Krendetan</span>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>
</html>
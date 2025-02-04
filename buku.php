<?php
include('koneksi.php'); // koneksi database
// mengambil data dari tb_buku pada database perpustakaansdkrendetan

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Data Buku</title>

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
      <!-- <li class="nav-item"> -->
        <!-- <a class="nav-link collapsed" href="laporan.php" aria-expanded="true" aria-controls="collapseUtilities"> -->
        <!-- <a class="nav-link collapsed" href="laporan.php" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">

          <img src="img/book.svg" width="8%" style="filter:invert(1);">
          <span>Laporan</span>
        </a>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="laporan-data-anggota.php">Laporan Data Anggota</a>
            <a class="collapse-item " href="laporan-data-buku.php">Laporan Data Buku</a>
            <a class="collapse-item " href="laporan-transaksi-pengembalian.php">Laporan Pengembalian</a>
          </div>
        </div>
      </li> -->
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
          <marquee behavior="scroll" direction="right">
            <h4>Perpustakaan SD Negeri Krendetan </h4>
          </marquee>
        </nav>
        <!-- End of Topbar -->


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="mt-4">Data Buku</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active">data buku</li>
          </ol>

          <!-- Button Tambah anggota -->
          <div class="col-md-12">
            <a href="tambah_buku.php" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Buku</a>
          </div>
          <!-- Akhir Button tambah Anggota -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Data Buku</h6>
            </div>

            <div class="card-body">
              <form action="" method="post">
                <input type="text" name="cari" size="25" placeholder="Search...." autofocus autocomplete="off">
                <button type="submit" class="btn btn-secondary"> Cari </button>
              </form>
              <br>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><center>No</center></th>
                      <th><center>ID BUKU</center></th>
                      <th><center>Judul Buku</center></th>
                      <th><center>Penerbit</center></th>
                      <th><center>Pengarang</center></th>
                      <th><center>Tahun Terbit</center></th>
                      <th><center>Jumlah Buku</center></th>
                      <th><center>Aksi</center></th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php

                    if (isset($_POST['cari'])) {
                      $cari = $_POST['cari'];
                      $data = mysqli_query($conn, "SELECT * FROM tb_buku WHERE judul_buku LIKE '%" . $cari . "%'
                                            OR id_buku LIKE '%" . $cari . "%' 
                                            OR penerbit LIKE '%" . $cari . "%'
                                            OR pengarang LIKE '%" . $cari . "%'
                                            OR tahun_terbit LIKE '%" . $cari . "%' ");
                                           
                    } else {
                      $data = mysqli_query($conn, "SELECT * FROM tb_buku");
                    }
                    $no = 1;
                    ?>
                    <?php foreach ($data as $tampilbuku) :
                    ?>
                      <tr>
                        <td><center><?= $no++; ?></center></td>
                        <td><center><?= $tampilbuku['id_buku']; ?></center></td>
                        <td><?= $tampilbuku['judul_buku']; ?></td>
                        <td><?= $tampilbuku['penerbit']; ?></td>
                        <td><?= $tampilbuku['pengarang']; ?></td>
                        <td><center><?= $tampilbuku['tahun_terbit']; ?></center></td>
                        <td><center><?= $tampilbuku['jumlah_buku']; ?></center></td>
                        <td>
                        <center>
                          <a href="ubah_buku.php?id=<?php echo $tampilbuku['id_buku'] ?>" class="btn btn-info btn-sm" >Edit</i></a>
                          <a href="hapus_buku.php?id=<?php echo $tampilbuku['id_buku'] ?>" class="btn btn-danger btn-sm">Hapus</i></a>
                    </center>
                        </td>
                      <?php endforeach; ?>

                      </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
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
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
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

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
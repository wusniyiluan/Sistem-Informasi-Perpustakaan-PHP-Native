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

  <title>Data Anggota</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="icon" href="img/log.png">


</head>

<body id="page-top">
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
        <a class="nav-link collapsed" href="logout.php" onclick="return confirm('Tambah Sebagai Anggota ?')">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2  text-gray-400"></i>
          
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
          <marquee behavior="scroll" direction="right">
            <h4>Perpustakaan SD Negeri Krendetan </h4>
          </marquee>
        </nav>
        <!-- End of Topbar -->


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="mt-4">Data Anggota</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active">data anggota</li>
          </ol>

          <!-- Button Tambah anggota -->
          <div class="col-md-12">
            <a href="tambah_anggota.php" class="btn btn-primary mb-3"><img src="img/person-add.svg" width="11%" style="filter:invert(1);"> Tambah Anggota</a>
          </div>
          <!-- Akhir Button tambah Anggota -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Anggota</h6>
            </div>
            <div class="card-body">
              <!-- untuk melakukan pencarian  -->
              <form action="" method="post">
                <input type="text" name="cari" size="25" placeholder="Search...." autofocus autocomplete="off">
                <input type="submit" class="btn btn-secondary" value="Cari">
              </form>
              <br>
              <div class="table-responsive">
                <table class="table table-bordered table-paginate" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th><center>NIS</center></th>
                      <th><center>Nama </center></th>
                      <th><center>Alamat</center></th>
                      <th><center>Jenis Kelamin</center></th>
                      <th><center>Kelas / unit</center></th>
                      <th><center>Aksi</center></th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    if (isset($_POST['cari'])) {
                      $cari = $_POST['cari'];
                      $data = mysqli_query($conn, " SELECT * FROM tb_anggotaa where nis like '%" . $cari . "%'
                                            OR nama_anggota LIKE '%" . $cari . "%' 
                                            OR alamat LIKE '%" . $cari . "%' 
                                            OR kelas LIKE '%" . $cari . "%'");
                    } else {
                      $data = mysqli_query($conn, "SELECT * FROM tb_anggotaa");
                    }
                    $no = 1;

                    ?>
                    <?php foreach ($data as $key) :

                    ?>
                      <tr>
                        <td><center><?= $no++; ?></center></td>
                        <td><center><?= $key['nis']; ?></center></td>
                        <td><?= $key['nama_anggota']; ?></td>
                        <td><?= $key['alamat']; ?></td>
                        <td><center><?= $key['jenkel']; ?></center></td>
                        <td><center><?= $key['kelas']; ?></center></td>
                        <td>
                          <center>
                          <a href="ubah anggota.php?id=<?php echo $key['nis'] ?>" class="btn btn-info btn-sm" >Edit</></a>
                          <a href="hapus_anggota.php?id=<?php echo $key['nis'] ?>" class="btn btn-danger btn-sm">Hapus</i></a>
                    </center>
                        </td>
                      <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
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
          <h5 class="modal-title" id="exampleModalLabel">Apakah ingin keluar dari halaman ini?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" di bawah untuk mengakhiri sesi ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="index.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
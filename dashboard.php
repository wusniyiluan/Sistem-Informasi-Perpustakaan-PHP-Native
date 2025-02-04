<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Dashboard</title>
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
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <marquee behavior="scroll" direction="right">
            <h5>
              <center> SELAMAT DATANG DI HALAMAN ADMIN PERPUSTAKAAN SD N KRENDETAN </center>
            </h5>
          </marquee>
        </nav>
        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-xl-3 col-md-8 mb-6">
              <?php
              include 'koneksi.php';
              $data_anggota = mysqli_query($conn, "SELECT * FROM tb_anggotaa");
              $jumlah_anggota = mysqli_num_rows($data_anggota);
              ?>
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Anggota</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $jumlah_anggota; ?> </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-8 mb-6">
              <?php
              $data_buku = mysqli_query($conn, "SELECT * FROM tb_buku");
              $jumlah_buku = mysqli_num_rows($data_buku);
              ?>
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Buku</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $jumlah_buku; ?> </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-8 mb-6">
              <?php
              $data_transaksi = mysqli_query($conn, "SELECT * FROM tb_transaksi WHERE status='pinjam'");
              $jumlah_transaksi = mysqli_num_rows($data_transaksi);
              ?>
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Transaksi Peminjaman</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_transaksi; ?> </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-8 mb-6">
              <?php
              $data_transaksi = mysqli_query($conn, "SELECT * FROM tb_transaksi WHERE STATUS='kembali'");           
              $jumlah_transaksi = mysqli_num_rows($data_transaksi);
              ?>
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Transaksi Pengembalian</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_transaksi; ?> </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-xl-12 col-lg-0">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">VISI, MISI DAN TUJUAN SD NEGERI KRENDETAN</h6>
                </div>
                <div class="card-body">
                  <br>
                  <p>
                    <b>VISI :</b> <br>
                    "Terwujudnya peserta didik yang berakhlak mulia, berprestasi, berjiwa mandiri, dan berwawasan global"
                  </p>
                  <br>
                  <p>
                    <b>MISI :</b> <br>
                    1. Mendorong pengalaman ajaran agama sehingga menjadi sumber kearifan dalam bertindak dan berperilaku. <br>
                    2. Menyelenggarakan pembelajaran dan bimbingan secara efektif untuk mengoptimalkan potensi akademis siswa. <br>
                    3. Menciptakan lingkungan sekolah yang tertib, aman, bersih, dan sehat. <br>
                    4. Menyelenggarakan latihan dan bimbingan untuk berprestasi dalam bidang keterampilan olahraga. <br>
                    5. Melestarikan dan mengembangkan seni budaya.
                    <br>
                  </p>
                  <p>
                    <b>TUJUAN :</b> <br>
                    1. Terciptanya tamatan yang lebih baik, 90% diterima di SMP Negeri. <br>
                    2. Terselenggaranya kegiatan kesenian daerah Nasional. <br>
                    3. Tinggi dalam berkompetensi baik dalam akademik dan non akademik. <br>
                    4. Meningkatkan kegiatan belajar mengajar yang optimal. <br>
                  </p>
                </div>
              </div>
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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
</body>
</html>
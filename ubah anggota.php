<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Anggota</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" href="img/log.png">
</head>

<body id="page-top">
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
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="laporan.php" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">

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
                    <form>
                        PERPUSTAKAAN SD NEGERI KRENDETAN
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <?php
                        date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
                        echo date('l, d-m-Y  H:i:s'); //kombinasi jam dan tanggal
                        ?>


                    </ul>

                </nav>
                <?php
                include('koneksi.php');

                // Ambil NIS lama dari parameter URL
                $nis_lama = $_GET['id'];

                // Ambil data anggota berdasarkan NIS lama
                $ambildataAnggota = $conn->query("SELECT * FROM tb_anggotaa WHERE nis = '$nis_lama'") or die(mysqli_error($conn));
                $tampildataAnggota = $ambildataAnggota->fetch_assoc();

                if (isset($_POST['ubah'])) {
                    // Ambil data dari form
                    $nis_baru = htmlspecialchars($_POST['nis']);
                    $nama = htmlspecialchars($_POST['nama_anggota']);
                    $alamat = htmlspecialchars($_POST['alamat']);
                    $jenkel = htmlspecialchars($_POST['jenkel']);
                    $kelas = htmlspecialchars($_POST['kelas']);

                    // Validasi input
                    if (empty($nis_baru) || empty($nama) || empty($alamat) || empty($jenkel) || empty($kelas)) {
                        echo "<script>alert('Pastikan anda sudah mengisi semua formulir.');window.location='anggota.php';</script>";
                        exit();
                    }

                    // Query untuk mengubah data
                    $sql = $conn->query("UPDATE tb_anggotaa SET 
                            nis = '$nis_baru', 
                            nama_anggota = '$nama', 
                            alamat = '$alamat', 
                            jenkel = '$jenkel', 
                            kelas = '$kelas' 
                         WHERE nis = '$nis_lama'") or die(mysqli_error($conn));

                    // Beri respons berdasarkan hasil query
                    if ($sql) {
                        echo "<script>alert('Data Berhasil Diubah.');window.location='anggota.php';</script>";
                    } else {
                        echo "<script>alert('Data Gagal Diubah.');window.location='anggota.php';</script>";
                    }
                }
                ?>

                <div class="container-fluid">
                    <center>
                        <h3><b> Edit Data Anggota</b></h3>
                    </center>
                    <hr>
                    <div class="row">
                        <div class="col-sm-7">
                            <form action="" method="post">

                                <div class="form-group">
                                    <label class="small mb-1" for="nis">NIS</label>
                                    <input class="form-control" id="nis" style="width: 190px; height: 38px; border: 1px solid #d1d3e2; border-radius: 0.35rem; " value="<?= $tampildataAnggota['nis']; ?>" name="nis" type="text" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="nama_anggota">Nama</label>
                                    <input class="form-control" id="nama_anggota" style="width: 270px; height: 38px; border: 1px solid #d1d3e2; border-radius: 0.35rem; " value="<?= $tampildataAnggota['nama_anggota']; ?>" name="nama_anggota" type="text" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="alamat">Alamat</label>
                                    <input class="form-control" id="alamat" style="width: 270px; height: 38px; border: 1px solid #d1d3e2; border-radius: 0.35rem; " value="<?= $tampildataAnggota['alamat']; ?>" name="alamat" type="text" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="jenkel">Jenis Kelamin</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio1" name="jenkel" value="Laki-Laki" class="custom-control-input" <?php if ($tampildataAnggota['jenkel'] == 'Laki-Laki') {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?>>
                                        <label class="custom-control-label" for="customRadio1">Laki-Laki</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" name="jenkel" class="custom-control-input" value="Perempuan" <?php if ($tampildataAnggota['jenkel'] == 'Perempuan') {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?>>
                                        <label class="custom-control-label" for="customRadio2">Perempuan</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="kelas">Kelas</label>
                                    <select name="kelas" id="kelas" class="form-control" style="width: 270px; height: 38px; border: 1px solid #d1d3e2; border-radius: 0.35rem;">
                                        <option value="">-- Pilih Kelas --</option>
                                        <option value="1 SD" <?php if ($tampildataAnggota['kelas'] == '1 SD') {
                                                                    echo "selected";
                                                                } ?>> 1 SD</option>
                                        <option value="2 SD" <?php if ($tampildataAnggota['kelas'] == '2 SD') {
                                                                    echo "selected";
                                                                } ?>> 2 SD</option>
                                        <option value="3 SD" <?php if ($tampildataAnggota['kelas'] == '3 SD') {
                                                                    echo "selected";
                                                                } ?>> 3 SD</option>
                                        <option value="4 SD" <?php if ($tampildataAnggota['kelas'] == '4 SD') {
                                                                    echo "selected";
                                                                } ?>> 4 SD</option>
                                        <option value="5 SD" <?php if ($tampildataAnggota['kelas'] == '5 SD') {
                                                                    echo "selected";
                                                                } ?>> 5 SD</option>
                                        <option value="6 SD" <?php if ($tampildataAnggota['kelas'] == '6 SD') {
                                                                    echo "selected";
                                                                } ?>> 6 SD</option>
                                        <!--  -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="ubah">Ubah Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

</body>

</html>
<?php
include('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tambah Peminjaman Buku</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link rel="icon" href="img/log.png">
</head>

<body>
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
            <li class="nav-item">
                <!-- <a class="nav-link collapsed" href="laporan.php" aria-expanded="true" aria-controls="collapseUtilities"> -->
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
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
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </nav>
                <div class="container-fluid">
                    <h1 class="mt-4">Tambah Data Transaksi</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">tambah data transaksi</li>
                    </ol>
                    <hr>
                    <div class="row">
                        <!-- class="col-sm-7" -->
                        <div class="card-header mb-5">
                            <h3>Silahkan Masukan Data Peminjaman Buku</h3><br>
                            <form action="insert-transaksii.php" method="POST">
                                <div class="form-group">
                                    <label>ID Peminjaman</label> <br>
                                    <input class="form-control-1" style="width: 200px; height: 38px; border: 1px solid #d1d3e2; border-radius: 0.35rem; " id="id_transaksi" name="id_transaksi" required />
                                </div>
                                <div class="form-group">
                                    <label>Buku</label>
                                    <select name="id_buku" id="id_buku" class="form-control" style="width: 400px; height: 38px; border: 1px solid #d1d3e2;" required>
                                        <option value="">--Pilih Buku--</option>
                                        <?php
                                        $tampilBuku = $conn->query("SELECT * FROM tb_buku ORDER BY id_buku") or die(mysqli_error($conn));

                                        while ($pecahBuku = $tampilBuku->fetch_assoc()) {
                                            echo "<option value='$pecahBuku[id_buku].$pecahBuku[judul_buku]'>$pecahBuku[id_buku] - $pecahBuku[judul_buku]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <select name="nis" id="nis" class="form-control" style="width: 400px; height: 38px; border: 1px solid #d1d3e2;" required>
                                        <option value="">-- Pilih Anggota --</option>
                                        <?php
                                        $transaksiAnggota = $conn->query("SELECT * FROM tb_anggotaa ORDER BY nis") or die(mysqli_error($conn));
                                        while ($pecahAnggota = $transaksiAnggota->fetch_assoc()) {
                                            echo "<option value='$pecahAnggota[nis].$pecahAnggota[nama_anggota]'>$pecahAnggota[nis] - $pecahAnggota[nama_anggota]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="tgl_pinjam">Tanggal Pinjam</label>
                                    <input type="date" name="tgl_pinjam" id="tgl_pinjamm" class="form-control form-control-alternative" style="width: 200px; height: 38px; border: 1px solid #d1d3e2;" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="tgl_kembali">Tanggal kembali</label>
                                    <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control form-control-alternative" style="width: 200px; height: 38px; border: 1px solid #d1d3e2;" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status Peminjaman</label>
                                    <input type="text" class="form-control" name="status" style="width: 200px; height: 38px; border: 1px solid #d1d3e2;" required>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="tambah">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

</body>

</html>
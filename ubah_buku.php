<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Buku</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
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
        <!-- Sidebar omitted for brevity -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <form>
                        SELAMAT DATANG DI HALAMAN ADMIN PERPUSTAKAAN SD N KRENDETAN
                    </form>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
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
                        <span><?php echo date('l, d-m-Y  H:i:s'); ?></span>
                    </ul>
                </nav>

                <?php
                include('koneksi.php');
                // mendapatkan id buku yang ada pada database
                $id_buku = $_GET['id'];


                $ambildatabuku = $conn->query("SELECT * FROM tb_buku WHERE id_buku = '$id_buku'") or die(mysqli_error($conn));
                $tampilbuku = $ambildatabuku->fetch_assoc();


                // Jika tombol ubah ditekan
                // Jika tombol ubah ditekan
                if (isset($_POST['ubah'])) {
                    $id_buku = htmlspecialchars($_POST['id_buku']);
                    $judul = htmlspecialchars($_POST['judul_buku']);
                    $penerbit = htmlspecialchars($_POST['penerbit']);
                    $pengarang = htmlspecialchars($_POST['pengarang']);
                    $tahun_terbit = htmlspecialchars($_POST['tahun_terbit']);
                    $jumlah_buku = htmlspecialchars($_POST['jumlah_buku']);
                    // Pastikan semua field terisi
                    if (empty($id_buku) || empty($judul) || empty($penerbit) || empty($pengarang) || empty($tahun_terbit) || empty($jumlah_buku)) {
                        echo "<script>alert('Pastikan Sudah Mengisi Semua Data Buku Dengan Benar.');window.location='buku.php';</script>";
                    } else {
                        // Cek apakah ID buku sudah ada
                        $cek_id_buku = $conn->query("SELECT * FROM tb_buku WHERE id_buku = '$id_buku'");
                        if ($cek_id_buku->num_rows > 0 && $id_buku != $_GET['id']) {
                            echo "<script>alert('ID Buku Sudah Ada.');window.location='buku.php';</script>";
                        } else {
                            // Lakukan query untuk mengubah data buku
                            $sql = "UPDATE tb_buku SET  id_buku = '$id_buku', judul_buku = '$judul', penerbit = '$penerbit', pengarang = '$pengarang', tahun_terbit = '$tahun_terbit',
             jumlah_buku = '$jumlah_buku' WHERE id_buku = '" . $_GET['id'] . "'";
                            $query_update = $conn->query($sql);

                            if ($query_update) {
                                echo "<script>alert('Data Berhasil Diubah.');window.location='buku.php';</script>";
                            } else {
                                echo "<script>alert('Data Gagal Diubah.');window.location='buku.php';</script>";
                            }
                        }
                    }
                }

                // include('koneksi.php');
                // // mendapatkan id buku yang ada pada
                // $id_buku_lama = $_GET['id'];


                // $ambildatabuku = $conn->query("SELECT * FROM tb_buku WHERE id_buku = '$id_buku_lama'") or die(mysqli_error($conn));
                // $tampilbuku = $ambildatabuku->fetch_assoc();


                // // Jika tombol ubah ditekan
                // if (isset($_POST['ubah'])) {
                //     $id_buku_baru = htmlspecialchars($_POST['id_buku']);
                //     $judul = htmlspecialchars($_POST['judul_buku']);
                //     $penerbit = htmlspecialchars($_POST['penerbit']);
                //     $pengarang = htmlspecialchars($_POST['pengarang']);
                //     $tahun_terbit = htmlspecialchars($_POST['tahun_terbit']);
                //     $jumlah_buku = htmlspecialchars($_POST['jumlah_buku']);
                //     // Pastikan semua field terisi
                //     if (empty($id_buku_baru)  || empty($judul) || empty($penerbit) || empty($pengarang) || empty($tahun_terbit) || empty($jumlah_buku)) {
                //         echo "<script>alert('Pastikan Sudah Mengisi Semua Data Buku Dengan Benar.');window.location='buku.php';</script>";
                //         exit();
                //     }
                //     $sql = $conn->query("UPDATE tb_buku SET 
                //             id_buku = '$id_buku_baru', 
                //             judul_buku = '$judul', 
                //             penerbit = '$penerbit', 
                //             pengarang = '$pengarang', 
                //             tahun_terbit = '$tahun_terbit',
                //             jumlah_buku = $jumlah_buku 
                //          WHERE id_buku = '$id_buku_lama'") or die(mysqli_error($conn));

                //     if ($sql) {
                //         echo "<script>alert('Data Berhasil Diubah.');window.location='buku.php';</script>";
                //     } else {
                //         echo "<script>alert('Data Gagal Diubah.');window.location='buku.php';</script>";
                //     }
                // }

                ?>
                <div class="container-fluid">
                    <center>
                        <h3><b> Edit Data Buku</b></h3>
                    </center>
                    <hr>
                    <div class="row">
                        <div class="col-sm-7">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label class="small mb-1" for="id_buku">ID BUKU</label>
                                    <input class="form-control" style="width: 190px; height: 38px; border: 1px solid #d1d3e2; border-radius: 0.35rem; " id="id_buku" name="id_buku" value="<?= $tampilbuku['id_buku']; ?>" name="isbn" type="text" placeholder="Masukkan ISBN Buku">
                                </div>

                                <div class="form-group">
                                    <label class="small mb-1" for="judul_buku">Judul Buku</label>
                                    <input class="form-control" style="width: 250px; height: 38px; border: 1px solid #d1d3e2; border-radius: 0.35rem;" id="judul_buku" value="<?= $tampilbuku['judul_buku']; ?>" name="judul_buku" type="text" placeholder="Masukkan judul buku" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="penerbit">Penerbit</label>
                                    <input class="form-control" style="width: 250px; height: 38px; border: 1px solid #d1d3e2; border-radius: 0.35rem; " id="penerbit" value="<?= $tampilbuku['penerbit']; ?>" name="penerbit" type="text" placeholder="Masukkan penerbit" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="pengarang">Pengarang</label>
                                    <input class="form-control" style="width: 250px; height: 38px; border: 1px solid #d1d3e2; border-radius: 0.35rem; " id="pengarang" value="<?= $tampilbuku['pengarang']; ?>" name="pengarang" type="text" placeholder="Masukkan pengarang" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="tahun_terbit">Tahun Terbit</label>
                                    <input class="form-control" style="width: 200px; height: 38px; border: 1px solid #d1d3e2; border-radius: 0.35rem;" id="tahun_terbit" value="<?= $tampilbuku['tahun_terbit']; ?>" name="tahun_terbit" type="text" placeholder="Masukkan tahun terbit" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="jumlah_buku">Jumlah Buku</label>
                                    <input class="form-control" style="width: 200px; height: 38px; border: 1px solid #d1d3e2; border-radius: 0.35rem;" id="jumlah_buku" value="<?= $tampilbuku['jumlah_buku']; ?>" name="jumlah_buku" type="text" placeholder="Masukkan jumlah buku" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="ubah">Ubah Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
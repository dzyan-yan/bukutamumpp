<?php
//buat session start
session_start();

//uji jika sesion telah diset/ tidak
if (
    empty($_SESSION['username'])
    or empty($_SESSION['password'])
    or empty($_SESSION['nama_user'])
) {
    echo "<script> alert('Maaf, Silahkan Login terlebih dahulu...!'); 
	document.location='login.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>MPP | Daftar Pengunjung</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">


    <!-- Custom fonts for this template -->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- koneksi ke database -->
    <?php

    include "koneksi.php";

    //uji tombol simpan
    if (isset($_POST['bsimpan'])) {

        date_default_timezone_set("Asia/Jakarta");
        $tgl            = date('Y-m-d');
        $nama           = strtoupper(htmlspecialchars($_POST['nama'], ENT_QUOTES));
        $alamat         = strtoupper(htmlspecialchars($_POST['alamat'], ENT_QUOTES));
        $tujuan         = strtoupper(htmlspecialchars($_POST['tujuan'], ENT_QUOTES));
        $keperluan      = strtoupper(htmlspecialchars($_POST['keperluan'], ENT_QUOTES));
        $nope           = htmlspecialchars($_POST['nope'], ENT_QUOTES);
        $suhu           = htmlspecialchars($_POST['suhu'], ENT_QUOTES);
        $keterangan     = strtoupper(htmlspecialchars($_POST['keterangan'], ENT_QUOTES));

        $simpan = mysqli_query($koneksi, "INSERT INTO ttamu VALUES ('','$tgl','$nama','$alamat','$tujuan','$keperluan','$nope','$suhu','$keterangan')");

        if ($simpan) {
            echo "<script>alert('Simpan data berhasil. Terimakasih.');
    document.location='?'</script>";
        } else {
            echo "<script>alert('Simpan data GAGAL !!!');
document.location='?'</script>";
        }
    }
    ?>


    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-text mx-3">
                    <img src="assets/img/logo1.png" class="img-fluid">
                </div>
            </a>

            <!-- Divider -->
            <hr class=" sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="editdata.php">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Edit Data Pengunjung</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Laporan</span>
                </a>


                <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Grafik</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="rekapitulasi.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Rekapitulasi Pengunjung</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-primary topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- awal -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle">
                                <marquee behavior="" direction="">
                                    <span class="mr-2 d-none d-lg-inline text-white">
                                        -- Semoga Lelahmu Jadi Ibadah dan Jangan Lupa Bersyukur --
                                    </span>
                                </marquee>

                            </a>
                        </li>
                        <!-- akhir -->




                        <div class="topbar-divider d-none d-sm-block"> </div>



                        <!-- awal -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle">
                                <span class="mr-2 d-none d-lg-inline text-white"> Sekarang
                                    <?php date_default_timezone_set("Asia/Jakarta");
                                    echo date("d M Y") ?>
                                </span>
                            </a>
                        </li>
                        <!-- akhir -->

                        <div class="topbar-divider d-none d-sm-block"> </div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-white"> Halo,
                                    <?php echo $_SESSION['nama_user'];

                                    ?>
                                </span>
                                <img class="img-profile rounded-circle" src="assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid bg-light">
                    <!-- Awal Form -->
                    <div class="row mt-2">
                        <!-- col lg-8 -->
                        <div class="col-lg-8 mb-3">
                            <div class="card shadow bg-gray-200">
                                <!-- card body -->
                                <div class="card-body">
                                    <div class=" p-1">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-3">Tambah Daftar Pengunjung</h1>
                                        </div>
                                        <form class="user" method="POST" action="">
                                            <div class="form-group">
                                                <select name="tujuan" class="dropdown form-control">
                                                    <option selected>Pilih Tujuan</option>
                                                    <option value="DPMPTSP">DPMPTSP</option>
                                                    <option value="BKAD">BKAD</option>
                                                    <option value="DISDUKCAPIL">DISDUKCAPIL</option>
                                                    <option value="DINSOS">DINSOS</option>
                                                    <option value="SAMSAT">SAMSAT</option>
                                                    <option value="POLRES">POLRES</option>
                                                    <option value="DPTR">DPTR</option>
                                                    <option value="DPUPRKP">DPUPRKP</option>
                                                    <option value="DISNAKER">DISNAKER</option>

                                                    <!-- nambah option instansi disini ya-->

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" style="text-transform: capitalize" name="nama" placeHolder="Nama" required>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" style="text-transform: capitalize" name="alamat" placeHolder="Alamat Lengkap">
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" style="text-transform: capitalize" name="keperluan" placeHolder="Keperluan">
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" name="nope" placeHolder="No. HP">
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" name="suhu" placeHolder="Suhu">
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" style="text-transform: none" name="keterangan" placeHolder="Keterangan">
                                            </div>

                                            <button type="submit" name="bsimpan" class="btn btn-danger btn-block">Simpan Data
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                        </div>
                        <!-- end col lg-8 -->

                        <!-- col lg-4 -->
                        <div class="col-lg-4 mb-3">
                            <!-- card -->
                            <div class="card shadow bg-light mb-3">
                                <!-- card body -->
                                <div class="card-body py-3">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-3 mt-2">Jumlah Pengunjung Hari Ini</h1>
                                    </div>

                                    <?php
                                    //tanggal sekarang
                                    $tgl_sekarang = date('Y-m-d');

                                    //tanggal kemarin
                                    //$kemarin = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));
                                    ?>

                                    <table class="table table-bordered">

                                        <tr>
                                            <?php
                                            //query tampilkan data pengunjung
                                            $data_dpmptsp = mysqli_query($koneksi, "SELECT * FROM ttamu where tujuan like '%DPMPTSP%' and tanggal like '%$tgl_sekarang%'");
                                            $jml_dpmptsp = mysqli_num_rows($data_dpmptsp);
                                            ?>
                                            <td>DPMPTSP</td>
                                            <td>: <?= $jml_dpmptsp; ?></td>
                                        </tr>

                                        <tr>
                                            <?php
                                            //query tampilkan data pengunjung
                                            $data_bkad = mysqli_query($koneksi, "SELECT * FROM ttamu where tujuan like '%BKAD%' and tanggal like '%$tgl_sekarang%'");
                                            $jml_bkad = mysqli_num_rows($data_bkad);
                                            ?>
                                            <td>BKAD</td>
                                            <td>: <?= $jml_bkad; ?></td>
                                        </tr>

                                        <tr>
                                            <?php
                                            //query tampilkan data pengunjung
                                            $data_disdukcapil = mysqli_query($koneksi, "SELECT * FROM ttamu where tujuan like '%DISDUKCAPIL%' and tanggal like '%$tgl_sekarang%'");
                                            $jml_disdukcapil = mysqli_num_rows($data_disdukcapil);
                                            ?>
                                            <td>DISDUKCAPIL</td>
                                            <td>: <?= $jml_disdukcapil; ?></td>
                                        </tr>

                                        <tr>
                                            <?php
                                            //query tampilkan data pengunjung
                                            $data_dinsos = mysqli_query($koneksi, "SELECT * FROM ttamu where tujuan like '%DINSOS%' and tanggal like '%$tgl_sekarang%'");
                                            $jml_dinsos = mysqli_num_rows($data_dinsos);
                                            ?>
                                            <td>DINSOS</td>
                                            <td>: <?= $jml_dinsos; ?></td>
                                        </tr>

                                        <tr>
                                            <?php
                                            //query tampilkan data pengunjung
                                            $data_samsat = mysqli_query($koneksi, "SELECT * FROM ttamu where tujuan like '%SAMSAT%' and tanggal like '%$tgl_sekarang%'");
                                            $jml_samsat = mysqli_num_rows($data_samsat);
                                            ?>
                                            <td>SAMSAT</td>
                                            <td>: <?= $jml_samsat; ?></td>
                                        </tr>

                                        <tr>
                                            <?php
                                            //query tampilkan data pengunjung
                                            $data_polres = mysqli_query($koneksi, "SELECT * FROM ttamu where tujuan like '%POLRES%' and tanggal like '%$tgl_sekarang%'");
                                            $jml_polres = mysqli_num_rows($data_polres);
                                            ?>
                                            <td>POLRES</td>
                                            <td>: <?= $jml_polres; ?></td>
                                        </tr>

                                        <tr>
                                            <?php
                                            //query tampilkan data pengunjung
                                            $data_dptr = mysqli_query($koneksi, "SELECT * FROM ttamu where tujuan like '%DPTR%' and tanggal like '%$tgl_sekarang%'");
                                            $jml_dptr = mysqli_num_rows($data_dptr);
                                            ?>
                                            <td>DPTR</td>
                                            <td>: <?= $jml_dptr; ?></td>
                                        </tr>

                                        <tr>
                                            <?php
                                            //query tampilkan data pengunjung
                                            $data_dpuprkp = mysqli_query($koneksi, "SELECT * FROM ttamu where tujuan like '%DPUPRKP%' and tanggal like '%$tgl_sekarang%'");
                                            $jml_dpuprkp = mysqli_num_rows($data_dpuprkp);
                                            ?>
                                            <td>DPUPRKP</td>
                                            <td>: <?= $jml_dpuprkp; ?></td>
                                        </tr>

                                        <tr>
                                            <?php
                                            //query tampilkan data pengunjung
                                            $data_disnaker = mysqli_query($koneksi, "SELECT * FROM ttamu where tujuan like '%DISNAKER%' and tanggal like '%$tgl_sekarang%'");
                                            $jml_disnaker = mysqli_num_rows($data_disnaker);
                                            ?>
                                            <td>DISNAKER</td>
                                            <td>: <?= $jml_disnaker; ?></td>
                                        </tr>

                                        <tfoot class="text-danger">
                                            <tr>
                                                <?php
                                                //query jumlah pengunjung hari ini
                                                $jml = ($jml_dpmptsp + $jml_bkad + $jml_disdukcapil + $jml_dinsos + $jml_samsat + $jml_polres + $jml_dptr + $jml_dpuprkp + $jml_disnaker);
                                                ?>

                                                <th>JUMLAH</th>
                                                <th>: <?= $jml; ?></th>
                                            </tr>
                                        </tfoot>

                                    </table>

                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col lg-4 -->

                    </div>
                    <!-- Akhir Form -->

                    <!-- AwalTabel Daftar Pengunjung -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pengunjung Hari Ini Tanggal
                                <?php date_default_timezone_set("Asia/Jakarta");
                                echo date("d M Y") ?></h6>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pengunjung</th>
                                            <th>Alamat Lengkap</th>
                                            <th>Tujuan</th>
                                            <th>Keperluan</th>
                                            <th>No. Handphone</th>
                                        </tr>
                                    </thead>

                                    <tbody style="text-transform: capitalize">
                                        <?php
                                        date_default_timezone_set("Asia/Jakarta");
                                        $tgl = date('Y-m-d');
                                        $tampil = mysqli_query($koneksi, "SELECT * FROM ttamu where tanggal like '%$tgl%' order by id_tamu desc");
                                        $no = 1;
                                        while ($data = mysqli_fetch_array($tampil)) {
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $data['nama'] ?></td>
                                                <td><?= $data['alamat'] ?></td>
                                                <td><?= $data['tujuan'] ?></td>
                                                <td><?= $data['keperluan'] ?></td>
                                                <td><?= $data['nope'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Tabel Daftar Pengunjung -->


                </div>
                <!-- /.container-fluid -->
            </div>

            <!-- Footer -->

            <footer class="sticky-footer text-center bg-light">
                <div class="copyright text-primary my-auto">
                    <h6>Copyright &copy; Mal Pelayanan Publik Gunungkidul 2022 - <?= date("Y") ?> | All rights reserved</h6>
                </div>
            </footer>

            <!-- End of Footer -->

        </div>
        <!-- End of Main Content -->
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
                    <h5 class="modal-title text-gray-900" id="exampleModalLabel">Yakin ingin keluar..?</h5>
                    <button class="close" type="button" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik Oke untuk melanjutkan. <br> Semoga Lelahmu Jadi Ibadah..!!</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="logout.php">Oke</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>

</body>

</html>
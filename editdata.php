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


    <title>MPP | Edit Data Pengunjung</title>
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
    <?php include "koneksi.php";

    //uji tombol ubah
    if (isset($_POST['bubah'])) {

        $ubah = mysqli_query($koneksi, "UPDATE ttamu  SET
                                                            tujuan = '$_POST[ttujuan]',
                                                            nama = '$_POST[tnama]',
                                                            alamat = '$_POST[talamat]',
                                                            keperluan = '$_POST[tkeperluan]',
                                                            nope = '$_POST[tnope]',
                                                            suhu = '$_POST[tsuhu]',
                                                            keterangan = '$_POST[tketerangan]'
                                                        WHERE id_tamu = '$_POST[id]'
                                                        ");
        //jika ubah sukses
        if ($ubah) {
            echo "<script>alert('Ubah data berhasil. Terimakasih.');
    document.location=''</script>";
        } else {
            echo "<script>alert('Ubah data GAGAL !!!');
    document.location=''</script>";
        }
    }

    //uji tombol hapus
    if (isset($_POST['bhapus'])) {

        $hapus = mysqli_query($koneksi, "DELETE FROM ttamu WHERE id_tamu = '$_POST[id]'");

        //jika hapus sukses
        if ($hapus) {
            echo "<script>alert('Hapus data berhasil. Terimakasih.');
    document.location=''</script>";
        } else {
            echo "<script>alert('Hapus data GAGAL !!!');
    document.location=''</script>";
        }
    }

    //uji tombol copy
    if (isset($_POST['bcopy'])) {

        date_default_timezone_set("Asia/Jakarta");
        $dtgl            = date('Y-m-d');
        $id              = htmlspecialchars($_POST['cid'], ENT_QUOTES);
        $dnama           = strtoupper(htmlspecialchars($_POST['cnama'], ENT_QUOTES));
        $dalamat         = strtoupper(htmlspecialchars($_POST['calamat'], ENT_QUOTES));
        $dtujuan         = strtoupper(htmlspecialchars($_POST['ctujuan'], ENT_QUOTES));
        $dkeperluan      = strtoupper(htmlspecialchars($_POST['ckeperluan'], ENT_QUOTES));
        $dnope           = htmlspecialchars($_POST['cnope'], ENT_QUOTES);
        $dsuhu           = htmlspecialchars($_POST['csuhu'], ENT_QUOTES);
        $dketerangan     = strtoupper(htmlspecialchars($_POST['cketerangan'], ENT_QUOTES));

        $copy = mysqli_query($koneksi, "INSERT INTO ttamu VALUES ('','$dtgl','$dnama','$dalamat','$dtujuan','$dkeperluan','$dnope','$dsuhu','$dketerangan')");

        if ($copy) {
            echo "<script>alert('Duplikat data berhasil. Terimakasih.');
    document.location='?'</script>";
        } else {
            echo "<script>alert('Duplikat data GAGAL !!!');
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

                    <!-- Awal Tabel Daftar Pengunjung -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Data Pengunjung Hari Ini Tanggal
                                <?php date_default_timezone_set("Asia/Jakarta");
                                echo date("d M Y") ?></h5>

                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Pengunjung</th>
                                            <th>Alamat Lengkap</th>
                                            <th>Tujuan</th>
                                            <th>Keperluan</th>
                                            <th>No. HP</th>
                                            <th>Aksi</th>
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
                                                <td>
                                                    <button class="btn btn-warning  text-gray-900" title="Edit" data-toggle="modal" data-target="#modalUbah<?= $no ?>"> <i class="fa fa-edit"></i> </button>
                                                    <button class="btn btn-danger" title="Hapus" data-toggle="modal" data-target="#modalHapus<?= $no ?>"> <i class="fa fa-trash"></i> </button>
                                                    <button class="btn btn-success" title="Copy" data-toggle="modal" data-target="#modalCopy<?= $no ?>"> <i class="fa fa-copy"></i> </button>
                                                </td>
                                            </tr>

                                            <!-- Awal Modal Ubah-->
                                            <div class="modal fade" id="modalUbah<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-gray-900">Ubah Data Pengunjung</h5>
                                                        </div>

                                                        <div class="modal-body">

                                                            <form class="user" method="POST" action="">
                                                                <input type="hidden" name="id" value="<?= $data['id_tamu'] ?>">

                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">Tujuan</label>
                                                                    <div class="col-sm-8">

                                                                        <select name="ttujuan" class="dropdown form-control">
                                                                            <option selected><?= $data['tujuan'] ?></option>
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
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">Nama</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" style="text-transform: capitalize" class="form-control" name="tnama" value="<?= $data['nama'] ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">Alamat</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" style="text-transform: capitalize" class="form-control" name="talamat" value="<?= $data['alamat'] ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">Keperluan</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" style="text-transform: capitalize" class="form-control" name="tkeperluan" value="<?= $data['keperluan'] ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">No. Handphone</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" name="tnope" value="<?= $data['nope'] ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">Suhu</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" name="tsuhu" value="<?= $data['suhu'] ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">Keterangan</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" style="text-transform: capitalize" class="form-control" name="tketerangan" value="<?= $data['keterangan'] ?>">
                                                                    </div>
                                                                </div>


                                                                <div class="modal-footer">
                                                                    <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                                                                    <button class="btn btn-success" type="submit" name="bubah" href="">Simpan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir Modal Ubah-->

                                            <!-- Awal Modal Hapus -->
                                            <div class="modal fade" id="modalHapus<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-gray-900">Hapus Data Pengunjung</h5>
                                                        </div>


                                                        <div class="modal-body">
                                                            <form class="user" method="POST" action="">
                                                                <input type="hidden" name="id" value="<?= $data['id_tamu'] ?>">

                                                                <h5 class="text-center">Yakin ingin menghapus data ini? <br>
                                                                    <span class="text-danger"><?= $data['nama'] ?></span>
                                                                </h5>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                                                            <button class="btn btn-danger" type="submit" name="bhapus" href="">Hapus</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- Akhir Modal Hapus -->

                                            <!-- Awal Modal Copy-->
                                            <div class="modal fade" id="modalCopy<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-gray-900">Ubah Data Pengunjung</h5>
                                                        </div>

                                                        <div class="modal-body">

                                                            <form class="user" method="POST" action="">
                                                                <input type="hidden" name="cid" value="<?= $data['id_tamu'] + 1 ?>">

                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">Tujuan</label>
                                                                    <div class="col-sm-8">

                                                                        <select name="ctujuan" class="dropdown form-control">
                                                                            <option selected><?= $data['tujuan'] ?></option>
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
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">Nama</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" name="cnama" value="<?= $data['nama'] ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">Alamat</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" name="calamat" value="<?= $data['alamat'] ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">Keperluan</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" name="ckeperluan" value="<?= $data['keperluan'] ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">No. Handphone</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" name="cnope" value="<?= $data['nope'] ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">Suhu</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" name="csuhu" value="<?= $data['suhu'] ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">Keterangan</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" name="cketerangan" value="<?= $data['keterangan'] ?>">
                                                                    </div>
                                                                </div>


                                                                <div class="modal-footer">
                                                                    <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                                                                    <button class="btn btn-info" type="submit" name="bcopy" href="">Copy</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir Modal Copy-->

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
            <div>
                <footer class="page-footer bg-light">
                    <div class="text-center text-primary py-3">
                        <h6>Copyright &copy; Mal Pelayanan Publik Gunungkidul 2022 - <?= date("Y") ?> | All rights reserved</h6>
                    </div>
                </footer>
            </div>
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

    <!-- Awal Logout Modal-->
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
    <!-- Akhir Logout Modal-->

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>

</body>

</html>
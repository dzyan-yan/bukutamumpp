<?php
//buat session start
session_start();

//uji jika sesion telah diset/ tidak
if (
    empty($_SESSION['username'])
    or empty($_SESSION['password'])
) {
    echo "<script> alert('Maaf, Silahkan Login terlebih dahulu...!'); 
	document.location='login.php';</script>";
}

include "koneksi.php";
?>


<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>MPP | Rekapitulasi Pengunjung</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body>

    <div class="container-fluid">
        <div class="col-md-12 mt-2">

            <!-- awal row -->
            <div class="row">
                <!-- awal col md 12 -->
                <div class="col-md-12 mt-4">
                    <!-- awal card -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Rekapitulasi Pengunjung</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="" class="text-center">
                                <div class="row">
                                    <div class="col-md-3"> </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Dari tanggal</label>
                                            <input class="form-control" type="date" name="tgl1" value="<?= isset($_POST['tgl1']) ? $_POST['tgl1'] : date('Y-m-d') ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Hingga tanggal</label>
                                            <input class="form-control" type="date" name="tgl2" value="<?= isset($_POST['tgl2']) ? $_POST['tgl2'] : date('Y-m-d') ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Pilih Instansi</label>
                                            <select name="tujuan" class="dropdown form-control">
                                                <option selected value="DPMPTSP">DPMPTSP</option>
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

                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>

                                    <div class="col-md-3">
                                        <button class="btn btn-warning form-control" name="btampilkan"><i class="fa fa-search"></i> Tampilkan</button>

                                    </div>
                                    <div class="col-md-3">
                                        <a href="admin.php" class="btn btn-danger form-control"><i class="fa fa-backward"></i> Kembali</a>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                            </form>

                            <?php
                            if (isset($_POST['btampilkan'])) :
                            ?>

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="mauexport" style="text-transform: capitalize" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Nama Pengunjung</th>
                                                <th>Alamat</th>
                                                <th>Tujuan</th>
                                                <th>Keperluan</th>
                                                <th>No. Handphone</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $tanggal1 = $_POST['tgl1'];
                                            $tanggal2 = $_POST['tgl2'];
                                            $tujuan = $_POST['tujuan'];

                                            $tampil = mysqli_query($koneksi, "SELECT * FROM ttamu where tanggal BETWEEN '$tanggal1' and '$tanggal2' and tujuan like '%$tujuan%' order by id_tamu asc");
                                            $no = 1;
                                            while ($data = mysqli_fetch_array($tampil)) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data['tanggal'] ?></td>
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
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- akhir card -->
                </div>
                <!-- akhir col md 12 -->
            </div>
            <!-- akhir row -->





        </div>

    </div>
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


    <script>
        $(document).ready(function() {
            $('#mauexport').DataTable({

                dom: 'Bfrtip',
                buttons: [{
                        extend: 'pdf',
                        oriented: 'Lanscape',
                        pageZise: 'A4',
                        title: 'Rekapitulasi Pengunjung MPP',
                        download: 'open',
                    },
                    'copy', 'excel', 'print'
                ]
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>



</body>

</html>
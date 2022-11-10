<?php
include "koneksi.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mal Pelayanan Publik Kabupaten Gunungkidul</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- Bootstrap CSS cdn online -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-info">
    <div class="container">

        <div class="row bg-gradient-light justify-content-center card shadow p-2 mt-4">
            <div class="card-header bg-transparent">
                <img src="assets/img/logo1.png" class="img-fluid">
                <div class="text-center">
                    <!-- <h1 class="text-gray-900">Lantai 2 Terminal Tipe A Dhaksinarga</h1> -->
                    <h5 class="text-gray-900">Jl. Insinyur Darmakum Darmokusumo, Selang V, Selang, Wonosari, Gunungkidul, DIY</h5>
                </div>
            </div>
            <!-- card body -->
            <div class="card-body py-2">

                <hr>

                <?php
                //tampilkan data dari tabel ikm (#tikm)
                $tampil = mysqli_query($koneksi, "SELECT * FROM tikm");
                $data = mysqli_fetch_array($tampil);
                ?>

                <style type="text/css">
                    .box {
                        padding: 30px 65px;
                        border-radius: 20px;
                    }

                    .hasil {
                        padding: 10px 1px;
                        border-radius: 10px;
                    }

                    h4 {
                        color: white;
                        text-align: center;
                    }

                    .teks {
                        color: black;
                        text-align: center;
                    }
                </style>

                <div class="container">
                    <h6 class="alert alert-warning mt-3 text-center" role="alert">HASIL PEROLEHAN PENILAIAN</h6>
                    <div class="row">
                        <div class="col-md-3 p-2">
                            <div class="bg-primary hasil text-white">
                                <h5 class="text-center">Sangat Puas</h5>
                                <h5 class="text-center"><?= $data['sangat_puas'] ?></h5>
                            </div>
                        </div>

                        <div class="col-md-3 p-2">
                            <div class="bg-info hasil text-white">
                                <h5 class="text-center">Puas</h5>
                                <h5 class="text-center"><?= $data['puas'] ?></h5>
                            </div>
                        </div>

                        <div class="col-md-3 p-2">
                            <div class="bg-success hasil text-white">
                                <h5 class="text-center">Cukup</h5>
                                <h5 class="text-center"><?= $data['cukup'] ?></h5>
                            </div>
                        </div>

                        <div class="col-md-3 p-2">
                            <div class="bg-danger hasil text-white">
                                <h5 class="text-center">Tidak Puas</h5>
                                <h5 class="text-center"><?= $data['tidak_puas'] ?></h5>
                            </div>
                        </div>

                    </div>
                </div>
                <hr>



                <div class="row">
                    <div class="col-md-1"> </div>
                    <div class="col-md-5 p-2">
                        <a class="btn btn-danger btn-block text-white" href="login.php">Login Buku Tamu</a>
                    </div>

                    <div class="col-md-5 p-2">
                        <a class="btn btn-warning btn-block text-gray-900" href="survei.php">Survei Kepuasan Layanan</a>
                    </div>
                    <div class="col-md-1"> </div>
                </div>

            </div>
        </div>
        <!-- end card body -->
    </div>
    </div>

    </div>
    <!-- col lg-5 -->


    <footer class="text-center text-light" href="#">
        <small>Copyright &copy; Mal Pelayanan Publik Gunungkidul 2022 - <?= date("Y") ?> | All rights reserved</small>
    </footer>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/sb-admin-2.js"></script>
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Custom scripts cdn online -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/chart-area-demo.js"></script>
    <script src="assets/js/demo/chart-pie-demo.js"></script>
    <script src="assets/js/demo/chart-bar-demo.js"></script>


</html>
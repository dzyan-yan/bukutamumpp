<!DOCTYPE html>
<html lang="en">

<?php
include "koneksi.php";
?>


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MPP | Login Buku Tamu</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-dark">

    <div class="container">

        <!-- Default Card Example -->
        <div class="row">
            <div class="col-md-4 text-center"></div>
            <div class="card col-lg-4 mb-3 mt-5">
                <div class="card-header bg-transparent">
                    <img src="assets/img/logo1.png" class="img-fluid">
                </div>
                <div class="card-body">
                    <form class="user" action="cek_login.php" method="post"> <br>
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                        </div>
                        <button class="btn btn-primary btn-block">Login</button>
                        <hr>
                        <div class="footer">
                            <footer class="text-center mt-2 text-muted">
                                <small>Copyright &copy <a href="index.php">MPP Gunungkidul</a> 2022 - <?= date("Y") ?></small>
                            </footer> <br>
                        </div>
                    </form>
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

</body>

</html>
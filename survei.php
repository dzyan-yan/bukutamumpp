<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <title>MPP | Survei Kepuasan Layanan</title>
  <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">

</head>


<?php
//koneksi ke database
include "koneksi.php";

//tampilkan data dari tabel ikm (#tikm)
$tampil = mysqli_query($koneksi, "SELECT * FROM tikm");
$data = mysqli_fetch_array($tampil);
?>


<body>

  <!-- head -->
  <div class="head text-center bg-info">
    <img src="assets/img/logo1.png" width="600px">
  </div>
  <!-- end head -->

  <style type="text/css">
    .box {
      padding: 30px 65px;
      border-radius: 20px;
    }

    .hasil {
      padding: 10px 40px;
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

  <!-- Awal Container -->
  <div class="container">
    <div class="alert alert-warning text-center mt-3" role="alert">SILAHKAN BERI PENILAIAN KUALITAS LAYANAN KAMI DENGAN MEMILIH GAMBAR DIBAWAH INI !!</div>

    <div class="row">
      <!-- Card Option Sangat Puas -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary bg-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">

                <a href="simpan.php?ket=sangat_puas" title="Klik icon ini jika anda PUAS dengan pelayanan kami">
                  <h4>Sangat Puas</h4>
                  <img src="assets/img/sangatpuas.png" class="img-fluid mb-3">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Card Option Puas -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success bg-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <a href="simpan.php?ket=puas" title="Klik icon ini jika anda PUAS dengan pelayanan kami">
                  <h4>Puas</h4>
                  <img src="assets/img/puas.png" class="img-fluid">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Card Option Cukup -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info bg-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <a href="simpan.php?ket=cukup" title="Klik icon ini jika anda KURANG PUAS dengan pelayanan kami">
                  <h4>Cukup</h4>
                  <img src="assets/img/cukup.png" class="img-fluid">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Card Option Tidak Puas -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning bg-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <a href="simpan.php?ket=tidak_puas" title="Klik icon ini jika anda TIDAK PUAS dengan pelayanan kami">
                  <h4>Tidak Puas</h4>
                  <img src="assets/img/tidakpuas.png" class="img-fluid">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- akhir -->

    <!--
  <div class="container">
    <div class="alert alert-warning mt-3 text-center" role="alert">HASIL PEROLEHAN PENILAIAN</div>
    <div class="row">

      <div class="col-md-3">
        <div class="bg-primary hasil text-white">
          <h4 class="text-center">Sangat Puas</h4>
          <h5 class="text-center"><?= $data['sangat_puas'] ?></h5>
        </div>
      </div>

      <div class="col-md-3">
        <div class="bg-info hasil text-white">
          <h4 class="text-center">Puas</h4>
          <h5 class="text-center"><?= $data['puas'] ?></h5>
        </div>
      </div>

      <div class="col-md-3">
        <div class="bg-success hasil text-white">
          <h4 class="text-center">Cukup</h4>
          <h5 class="text-center"><?= $data['cukup'] ?></h5>
        </div>
      </div>

      <div class="col-md-3">
        <div class="bg-danger hasil text-white">
          <h4 class="text-center">Tidak Puas</h4>
          <h5 class="text-center"><?= $data['tidak_puas'] ?></h5>
        </div>
      </div>

    </div>
  </div>

  <!-- Akhir Container -->
  </div>

  <!-- Footer -->
  <footer class="bg-light text-center text-white mt-3 pb-2 text-muted">
    <!-- Copyright -->
    <div>Copyright &copy <a href=" index.php"> Mal Pelayanan Publik Kabupaten Gunungkidul</a> 2022 - <?= date("Y") ?> | All Right Reserved | Version: 1.0.0
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>
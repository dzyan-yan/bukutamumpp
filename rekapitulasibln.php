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


<!-- PEMBATAS BROOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO-->


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
        <thead>
            <tr>
                <th rowspan="2" class="text-center">Nama Instansi</th>
                <th colspan="31" class="text-center">Tanggal</th>
            </tr>
            <tr>
                <th>01</th>
                <th>02</th>
                <th>03</th>
                <th>04</th>
                <th>05</th>
                <th>06</th>
                <th>08</th>
                <th>09</th>
                <th>10</th>
                <th>11</th>
                <th>12</th>
                <th>13</th>
                <th>14</th>
                <th>15</th>
                <th>16</th>
                <th>17</th>
                <th>18</th>
                <th>19</th>
                <th>20</th>
                <th>21</th>
                <th>22</th>
                <th>23</th>
                <th>24</th>
                <th>25</th>
                <th>26</th>
                <th>27</th>
                <th>28</th>
                <th>29</th>
                <th>30</th>
                <th>31</th>
            </tr>
        </thead>



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

        <tfoot>
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



<?php
include "footer.php";
?>
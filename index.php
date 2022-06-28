<?php
include "layout/_header.php";

// PASIEN
$query_pasien = mysqli_query($koneksi, "SELECT COUNT(*) as total_pasien FROM pasien");
$total_pasien = mysqli_fetch_array($query_pasien);

// DOKTER
$query_dokter = mysqli_query($koneksi, "SELECT COUNT(*) as total_dokter FROM dokter");
$total_dokter = mysqli_fetch_array($query_dokter);

// OBAT
$query_obat = mysqli_query($koneksi, "SELECT COUNT(*) as total_obat FROM obat");
$total_obat = mysqli_fetch_array($query_obat);

// USER
$query_user = mysqli_query($koneksi, "SELECT COUNT(*) as total_user FROM user");
$total_user = mysqli_fetch_array($query_user);
?>

<div class="container">
    <div class="bg-light shadow-sm mt-3 p-4 rounded-3">
        <h1 class="display-4">Selamat datang di Klinik Apps</h1>
        <hr>
        <p>Memberikan layanan terbaik kepada anda <i class="bi bi-hearts text-danger"></i></p>
    </div>

    <h1 class="text-center mt-5 mb-4">Data Klinik</h1>
    <div class="row mx-0">
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-header">
                    Jumlah Pasien
                </div>
                <div class="card-body">
                    <h1><?= $total_pasien['total_pasien'] ?></h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-header">
                    Jumlah Dokter
                </div>
                <div class="card-body">
                    <h1><?= $total_dokter['total_dokter'] ?></h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-header">
                    Jumlah Obat
                </div>
                <div class="card-body">
                    <h1><?= $total_obat['total_obat'] ?></h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-header">
                    Jumlah User
                </div>
                <div class="card-body">
                    <h1><?= $total_user['total_user'] ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "layout/_footer.php";
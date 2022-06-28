<?php
include "__koneksi.php";
session_start();
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
// var_dump($uriSegments);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Klinik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php"><i class="bi bi-hospital"></i> Klinik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= $uriSegments[2] == 'index.php' || $uriSegments[2] == '' ? 'active' : '' ?>" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $uriSegments[2] == 'pasien.php' ? 'active' : '' ?>" href="pasien.php">Pasien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $uriSegments[2] == 'dokter.php' ? 'active' : '' ?>" href="dokter.php">Dokter</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= $uriSegments[2] == 'berobat.php' || $uriSegments[2] == 'obat.php' || $uriSegments[2] == 'resep_obat.php' ? 'active' : '' ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Berobat
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="berobat.php">Berobat</a></li>
                            <li><a class="dropdown-item" href="obat.php">Obat</a></li>
                            <li><a class="dropdown-item" href="resep_obat.php">Resep Obat</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $uriSegments[2] == 'user.php' ? 'active' : '' ?>" href="user.php">User</a>
                    </li>
                    <?php if (!$_SESSION['userdata']['logged_in']) : ?>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-light text-info" href="login.php">Login</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $_SESSION['userdata']['nama_lengkap'] ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="aktivitas.php">Aktivitas</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="__controller.php?logout=1">Logout</a>
                                </li>
                            </ul>
                        </li>
                    <?php endif ?>

                </ul>
            </div>
        </div>
    </nav>

    <div class="mt-3">
        <?php
        if (isset($_SESSION['success'])) {
        ?>
            <div class="alert alert-primary alert-dismissible fade show container" role="alert">
                <?= $_SESSION['success'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            unset($_SESSION['success']);
        } else if (isset($_SESSION['error'])) {
        ?>
            <div class="alert alert-danger alert-dismissible fade show container" role="alert">
                <?= $_SESSION['error'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            unset($_SESSION['error']);
        }
        ?>
    </div>
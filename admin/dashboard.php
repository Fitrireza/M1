<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['user'])) {
    header("location:login.php");
    exit;
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./fontawesome/css/all.min.css">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <title>ADMINISTRATOR</title>
</head>


<body>
    <?php include 'page/navbar.php'; ?>
    <div class="row no-gutters mt-3">
        <div class="col-md-2 bg-dark mt-4 pr-3 pt-4">
            <ul class="nav flex-column ml-3 mb-5">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="index.php"><i
                            class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="dosen.php"><i class="fas fa-user-graduate mr-2"></i>Daftar
                        Dosen</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php"><i class="fas fa-users mr-2"></i>Daftar
                        Mahasiswa</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="pegawai.php"><i class="fas fa-users mr-2"></i>Daftar
                        Pegawai</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="jadwal.php"><i class="far fa-calendar-alt mr-2"></i>Jadwal
                        Kuliah</a>
                    <hr class="bg-secondary">
                </li>
            </ul>
        </div>
    <div class="col-md-10 p-5 pt-2 mt-5">
        <h3><i class=" mr-2"></i> Selamat Datang
            <?= $user ?> 👋
        </h3>
        <hr>


    </div>
</body>

</html>
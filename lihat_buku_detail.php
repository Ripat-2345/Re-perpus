<?php
include('./config/functions/functionApp.php');
$id = $_GET['id_buku'];
$detailBuku = detail($id);

if (!isset($_SESSION['login'])) {
    header('location:auth_login.php');
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
    <link href="./app/assets/img/logo/Logo_smk_tritech.png" rel="icon">
    <title>Perpus Tech</title>
    <?php include('./app/layouts/css.php'); ?>
    <style>
        .hover :hover {
            background-color: #5DC764;
            color: white;
            border-radius: 5%;
            transition: 0.2s;
        }
    </style>
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-light mt-2">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mx-5" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="home.php" style="font-size: 2rem;"><img src="./app/assets/img/logo/Logo_smk_tritech.png" alt="" style="width:3rem; border-radius:10%;" class="py-auto"> Perpus Tech</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="lihat_buku.php" style="font-size: 1.5rem;">Cari Buku</a>
                </li>
            </ul>
            <?php if (isset($_SESSION['login'])) : ?>
                <div class="dropdown">
                    <button class="btn btn-sm btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="./app/assets/img-profile rounded-circle" src="./app/assets/img/boy.png" style="max-width: 35px">
                        <span class="ml-2 d-none d-lg-inline text-white large">Hi, <?= $_SESSION['nama']; ?></span>
                    </button>
                    <div class="dropdown-menu hover" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="auth_logout.php" onclick="return confirm('Yakin ingin logout!')"><i class="fas fa-sign-out-alt mx-2 text-dark"></i>Logout</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </nav>

    <div class="row m-5">
        <div class="col-2"></div>
        <div class="col-10">
            <div class="card mb-3" style="max-width: 1000px;">
                <div class="row no-gutters">
                    <div class="col-md-4" style="height: 24rem;">
                        <img src="./app/img/<?= $detailBuku['gambar']; ?>" class="card-img" style="height:100%;" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title"><b><?= $detailBuku['judul']; ?></b></h2>
                            <h5 class="card-title"><?= $detailBuku['pencipta']; ?></h5>
                            <p class="card-title">Penerbit : <?= $detailBuku['penerbit']; ?>
                                <br>Kategori : <?= $detailBuku['nama_kategori']; ?>
                                <br>Deskripsi : <?= $detailBuku['deskripsi']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Footer -->
    <footer class="fixed-bottom">
        <?php include('./app/layouts/footer.php'); ?>
    </footer>
    <!-- Footer -->
    <!-- Js -->
    <?php include('./app/layouts/js.php'); ?>
</body>

</html>
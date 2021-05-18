<?php
include('./config/conn.php');
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
        <div class="col-lg-6 col-md-4">
            <h1 class="mt-4" style="font-size:3.5rem; font-family:Arial, Helvetica, sans-serif; color:#5DC764;"><b>PERPUSTAKAAN</b>
                <h2>SMK TRITECH INFORMATIKA</h2>
            </h1>
            <h5 class="my-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam, aspernatur alias. Soluta, explicabo reiciendis? Suscipit distinctio corporis molestiae maiores iste! Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, corporis culpa accusantium vitae alias consectetur!</h5>
            <a href="lihat_buku.php" class="btn btn-success">Cari Buku</a>
        </div>
        <div class="col-lg-6 col-md-4">
            <img src="./app/assets/img/undraw_book_reading_kx9s.png" alt="" style="width: 100%; height:100%;">
        </div>
    </div>

    <section class="row" style="height:17rem;"></section>

    <section class="row m-5">
        <div class="col-lg-6 col-md-4">
            <img src="./app/assets/img/undraw_reading_time_gvg0.png" alt="" style="width: 100%; height:100%;">
        </div>
        <div class="col-lg-6 col-md-4 p-4">
            <h1 style="font-size:2.5rem; font-family:Arial, Helvetica, sans-serif; color:#5DC764;"><b>Peraturan di perpustakaan</b></h1>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">1.Cras justo odio</li>
                <li class="list-group-item">2.Dapibus ac facilisis in</li>
                <li class="list-group-item">3.Morbi leo risus</li>
                <li class="list-group-item">4.Porta ac consectetur ac</li>
                <li class="list-group-item">5.Vestibulum at eros</li>
            </ul>
        </div>
    </section>
    <!-- Footer -->
    <?php include('./app/layouts/footer.php'); ?>
    <!-- Footer -->

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Js -->
    <?php include('./app/layouts/js.php'); ?>
</body>

</html>
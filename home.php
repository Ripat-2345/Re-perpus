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
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-light mt-2">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mx-5" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#" style="font-size: 2rem;"><img src="./app/assets/img/logo/Logo_smk_tritech.png" alt="" style="width:3rem; border-radius:10%;" class="py-auto"> Perpus Tech</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#" style="font-size: 1.5rem;">List Buku</a>
                </li>
            </ul>
            <?php if (isset($_SESSION['login'])) : ?>
                <a href="auth_logout.php" class="btn btn-success" onclick="return confirm('Yakin!')">Logout</a>
            <?php endif; ?>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 col-md-4">
                <h1 class="mt-4" style="font-size:3.5rem; font-family:Arial, Helvetica, sans-serif; color:#5DC764;"><b>PERPUSTAKAAN</b>
                    <h2>SMK TRITECH INFORMATIKA</h2>
                </h1>
                <h5 class="mt-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam, aspernatur alias. Soluta, explicabo reiciendis? Suscipit distinctio corporis molestiae maiores iste!</h5>
                <a href="#" class="btn btn-success mt-3">Lihat Buku</a>
            </div>
            <div class="col-lg-6 col-md-4">
                <img src="./app/assets/img/undraw_book_lover_mkck.png" alt="" style="width: 100%; height:100%;">
            </div>
        </div>

        <section class="row" style="height:10rem;"></section>

        <section class="row mt-lg-5">
            <div class="col-lg-6 col-md-4">
                <img src="./app/assets/img/undraw_reading_time_gvg0.png" alt="" style="width: 100%; height:100%;">
            </div>
            <div class="col-lg-6 col-md-4">
                <h1 style="font-size:2.5rem; font-family:Arial, Helvetica, sans-serif; color:#5DC764;">Peraturan di perpustakaan</h1>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Morbi leo risus</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
            </div>
        </section>
    </div>
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
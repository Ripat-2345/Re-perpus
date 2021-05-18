<?php
include('./config/functions/functionApp.php');
$buku = query("SELECT * FROM buku");
if (!isset($_SESSION['login'])) {
    header('location:auth_login.php');
}

$buku = query("SELECT * FROM buku");
$awalData = 0;
$jumlahDataPerhalaman = 12;
$jumlahData = count(query("SELECT * FROM buku"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = (isset($_GET['halaman']) ? $_GET['halaman'] : 1);

$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;
$buku = query("SELECT * FROM buku  Limit $awalData,$jumlahDataPerhalaman");

if (isset($_GET['cari'])) {
    $keyword = $_GET["keyword"];
    $jumlahData = count(query("SELECT * FROM buku  Where judul Like '%$keyword%'"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
    $halamanAktif = (isset($_GET['halaman']) ? $_GET['halaman'] : 1);
    $awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;
    $buku = cari($_GET["keyword"], $awalData, $jumlahDataPerhalaman);
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

    <section class="row mx-5 mt-5">
        <div class="col-lg-12">
            <div class="card">
                <form action="" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" placeholder="Cari Judul Buku" name="keyword">
                        <div class="input-group-btn">
                            <button class="btn btn-lg btn-success" name="cari"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <div class="row m-5 align-content-center">
        <?php foreach ($buku as $dataBuku) : ?>
            <div class="col-lg-3 my-2">
                <div class="card" style="width: 18rem;">
                    <img src="./app/img/<?= $dataBuku['gambar']; ?>" class="card-img-top" height="300" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-dark"><b><?= $dataBuku['judul']; ?></b></h5>
                        <p class="card-text"><?= $dataBuku['pencipta']; ?></p>
                        <a href="lihat_buku_detail.php?id_buku=<?= $dataBuku['id_buku']; ?>" class="btn btn-sm btn-success">Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


    </div>
    <div class="card-footer text-right">
        <nav class="d-inline-block">
            <ul class="pagination mb-0">
                <?php if (isset($_GET['cari'])) { ?>
                    <?php if ($halamanAktif > 1) : ?>
                        <a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>&keyword=<?php echo $_GET['keyword'] ?>" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                        <?php if ($i == $halamanAktif) : ?>
                            <li class="page-item active">
                                <a class="page-link" href="?halaman=<?= $i; ?>&keyword=<?php echo $_GET['keyword'] ?>&cari="><?= $i; ?></a>
                            </li>
                        <?php else : ?>
                            <li class="page-item">
                                <a class="page-link" href="?halaman=<?= $i; ?>&keyword=<?php echo $_GET['keyword'] ?>&cari="><?= $i; ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <?php if ($halamanAktif < $jumlahHalaman) : ?>
                        <a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>&keyword=<?php echo $_GET['keyword'] ?>&cari="><i class="fas fa-chevron-right"></i></a>
                    <?php endif; ?>
                <?php } else { ?>
                    <?php if ($halamanAktif > 1) : ?>
                        <a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                        <?php if ($i == $halamanAktif) : ?>
                            <li class="page-item active">
                                <a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                            </li>
                        <?php else : ?>
                            <li class="page-item">
                                <a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <?php if ($halamanAktif < $jumlahHalaman) : ?>
                        <a class="page-link" href="?halaman=<?= $halamanAktif + 1 ?>"><i class="fas fa-chevron-right"></i></a>
                    <?php endif; ?>
                <?php } ?>
            </ul>
        </nav>
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
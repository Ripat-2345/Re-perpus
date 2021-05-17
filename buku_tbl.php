<?php
include('./config/functions/functionBuku.php');
$buku = query("SELECT * FROM buku INNER JOIN kategori ON buku.id_kategori = kategori.id_kategori");
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
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include('./app/layouts/sidebar.php'); ?>
        <!-- Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- TopBar -->
                <?php include('./app/layouts/topbar.php'); ?>
                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Manajemen Buku</h1>
                    </div>

                    <!--Row-->
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <!-- Simple Tables -->
                            <div class="card">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <a href="./buku_tambah.php" class="btn btn-sm btn-primary">Tambah Buku</a>
                                    <form action="" method="POST">
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-sm" placeholder="Cari">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush text-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Judul Buku</th>
                                                <th>Kategori</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($buku as $dataBuku) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $dataBuku['judul']; ?></td>
                                                    <td><?= $dataBuku['nama_kategori']; ?></td>
                                                    <td><a href="buku_detail.php?id_buku=<?= $dataBuku['id_buku']; ?>" class="btn btn-sm btn-info">Detail</a> <a href="peminjaman_tambah.php?id_buku=<?= $dataBuku['id_buku']; ?>" class="btn btn-sm btn-warning">Pinjam</a></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Logout -->
                    <?php include('./app/layouts/modalLogout.php'); ?>

                </div>
                <!---Container Fluid-->
            </div>

            <!-- Footer -->
            <?php include('./app/layouts/footer.php'); ?>
            <!-- Footer -->
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Js -->
    <?php include('./app/layouts/js.php'); ?>
</body>

</html>
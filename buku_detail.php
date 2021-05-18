<?php
include('./config/functions/functionBuku.php');

$id = $_GET['id_buku'];

$detailBuku = detail($id);
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
                        <h1 class="h3 mb-0 text-gray-800">Detail Buku</h1>
                    </div>

                    <!--Row-->
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <!-- Simple Tables -->
                            <div class="card">
                                <div class="table-responsive mt-4">
                                    <table class="table align-items-center table-flush">
                                        <tbody>
                                            <tr>
                                                <th style="width:250px;">Gambar Buku</th>
                                                <td>: <img src="./app/img/<?= $detailBuku['gambar']; ?>" alt="" width="100" height="120" class="img-thumbnail"></td>
                                            </tr>
                                            <tr>
                                                <th style="width:250px;">Judul Buku</th>
                                                <td>: <?= $detailBuku['judul']; ?></td>
                                            </tr>
                                            <tr>
                                                <th style="width:250px;">Penerbit</th>
                                                <td>: <?= $detailBuku['penerbit']; ?></td>
                                            </tr>
                                            <tr>
                                                <th style="width:250px;">Pencipta</th>
                                                <td>: <?= $detailBuku['pencipta']; ?></td>
                                            </tr>
                                            <tr>
                                                <th style="width:250px;">Deskripsi</th>
                                                <td><textarea class="form-control" cols="30" rows="10" readonly><?= $detailBuku['deskripsi']; ?></textarea></td>
                                            </tr>
                                            <tr>
                                                <th style="width:250px;">Kategori</th>
                                                <td>: <?= $detailBuku['nama_kategori']; ?></td>
                                            </tr>

                                            <tr>
                                                <th style="width:250px;">Jumlah Buku</th>
                                                <td>: <?= $detailBuku['jumlah_buku']; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-right">
                                                    <a href="buku_ubah.php?id_buku=<?= $detailBuku['id_buku']; ?>" class="btn btn-warning">Ubah</a>
                                                    <a href="buku_hapus.php?id_buku=<?= $detailBuku['id_buku']; ?>" class="btn btn-danger" onclick="return confirm('Yakin!')">Hapus</a>
                                                </td>
                                            </tr>
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
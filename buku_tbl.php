<?php
include('./config/functions/functionBuku.php');
$buku = query("SELECT * FROM buku");
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
                        <h1 class="h3 mb-0 text-gray-800">Manajemen BUKU</h1>
                    </div>

                    <!--Row-->
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <!-- Simple Tables -->
                            <div class="card">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Tabel Buku</h6>
                                    <a href="./buku_tambah.php" class="btn btn-primary">Tambah Buku</a>

                                </div>
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Penerbit</th>
                                                <th>Pencipta</th>
                                                <th>Id Kategori</th>
                                                <th>Jumlah</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($buku as $dataBuku) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $dataBuku['judul']; ?></td>
                                                    <td><?= $dataBuku['penerbit']; ?></td>
                                                    <td><?= $dataBuku['pencipta']; ?></td>
                                                    <td><?= $dataBuku['id_kategori']; ?></td>
                                                    <td><?= $dataBuku['jumlah_buku']; ?></td>
                                                    <td><a href="buku_detail.php?id_buku=<?= $dataBuku['id_buku']; ?>" class="btn btn-sm btn-info">Detail</a></td>
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
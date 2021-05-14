<?php
include('./config/functions/functionBuku.php');

$dataKategori = query("SELECT * FROM kategori");
if (isset($_POST['submit'])) {

    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambah!');
                document.location.href = 'buku_tbl.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambah!');
                document.location.href = 'buku_tambah.php';
            </script>
        ";
    }
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
                            <div class="col-lg">
                                <!-- Form Basic -->
                                <div class="card lg">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Tambah Buku</h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <div class="form-group">
                                                <label for="judul">Judul</label>
                                                <input type="text" class="form-control" id="judul" name="judul" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="penerbit">Penerbit</label>
                                                <input type="penerbit" class="form-control" id="penerbit" name="penerbit" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="pencipta">Pencipta</label>
                                                <input type="text" class="form-control" id="pencipta" name="pencipta" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="id_kategori">Kategori</label>
                                                <select name="id_kategori" id="id_kategori" class="form-control">
                                                    <option>-- Pilih --</option>
                                                    <?php foreach ($dataKategori as $dataKategori) : ?>
                                                        <option value="<?= $dataKategori['id_kategori']  ?>"><?= $dataKategori['nama_kategori'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="jumlah_buku">Jumlah Buku</label>
                                                <input type="number" class="form-control" id="jumlah_buku" name="jumlah_buku" required>
                                            </div>

                                            <button type="submit" name="submit" class="btn btn-success">Tambah</button>
                                        </form>
                                    </div>
                                </div>
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
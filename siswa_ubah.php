<?php
include('./config/functions/functionSiswa.php');

$id = $_GET['id_siswa'];

$dataSiswa = query("SELECT * FROM siswa WHERE id_siswa = $id")[0];

if (isset($_POST['submit'])) {

    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = 'siswa_tbl.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah!');
                document.location.href = 'siswa_ubah.php';
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
                        <h1 class="h3 mb-0 text-gray-800">Manajemen Siswa</h1>
                    </div>

                    <!--Row-->
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <!-- Simple Tables -->
                            <div class="col-lg">
                                <!-- Form Basic -->
                                <div class="card lg">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Ubah Siswa</h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <input type="hidden" name="id_siswa" value="<?= $dataSiswa['id_siswa']; ?>">
                                            <div class="form-group">
                                                <label for="nis">NIS</label>
                                                <input type="number" class="form-control" id="nis" name="nis" value="<?= $dataSiswa['nis']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_siswa">Nama</label>
                                                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?= $dataSiswa['nama_siswa']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="kelas">Kelas</label>
                                                <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $dataSiswa['kelas']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="no_telp">No Telp</label>
                                                <input type="number" class="form-control" id="no_telp" name="no_telp" value="<?= $dataSiswa['no_telp']; ?>" required>
                                            </div>
                                            <input type="hidden" name="created_at" value="<?= $dataSiswa['created_at']; ?>">
                                            <button type="submit" name="submit" class="btn btn-success">Ubah</button>
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
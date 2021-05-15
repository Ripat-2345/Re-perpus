<?php
include('./config/functions/functionPeminjaman.php');

$id = $_GET['id_peminjaman'];

$detailPeminjaman = detail($id);
if (isset($_POST['submit'])) {
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('Buku berhasil diubah!');
                document.location.href = 'history_tbl.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Buku gagal dipinjam!');
                document.location.href = 'buku_tbl.php';
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
                        <h1 class="h3 mb-0 text-gray-800">Peminjaman Buku</h1>
                    </div>

                    <!--Row-->
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <!-- Simple Tables -->
                            <div class="col-lg">
                                <!-- Form Basic -->
                                <div class="card lg">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Tambah Peminjaman</h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <input type="text" name="id_peminjaman" id="id_peminjaman" value="<?= $detailPeminjaman['id_peminjaman'] ?>" hidden>
                                            <div class="form-group">
                                                <label for="penerbit">Judul</label>
                                                <input type="penerbit" class="form-control" id="penerbit" name="penerbit" placeholder="<?= $detailPeminjaman['judul'] ?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="penerbit">Penerbit</label>
                                                <input type="penerbit" class="form-control" id="penerbit" name="penerbit" placeholder="<?= $detailPeminjaman['penerbit'] ?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="pencipta">Pencipta</label>
                                                <input type="text" class="form-control" id="pencipta" name="pencipta" placeholder="<?= $detailPeminjaman['pencipta'] ?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="pencipta">Petugas</label>
                                                <input type="text" class="form-control" id="petugas" name="petugas" placeholder="<?= $detailPeminjaman['nama_petugas'] ?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="nis">NIS Siswa</label>
                                                <input type="number" class="form-control" id="nis" name="nis" required placeholder="<?= $detailPeminjaman['nis'] ?>" disabled>
                                            </div>

                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option>-- Pilih --</option>
                                                    <option value="1">dipimjam</option>
                                                    <option value="2">dikembalikan</option>
                                                </select>
                                            </div>
                                            <input type="hidden" name="created_at" value="<?= $detailPeminjaman['created_at']; ?>">


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
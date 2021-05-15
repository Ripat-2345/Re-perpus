<?php
include('./config/functions/functionPeminjaman.php');
$id = $_GET['id_buku'];
$dataBuku = query("SELECT * FROM buku WHERE id_buku = $id")[0];
$petugas = query("SELECT * FROM petugas");
if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Buku berhasil dipinjam!');
                document.location.href = 'petugas_tbl.php';
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
<<<<<<< HEAD
                                            <input type="hidden" class="form-control" id="id_buku" name="id_buku" value="<?= $dataBuku['id_buku'] ?>">
                                            <div class="form-group">
                                                <label for="judul">Judul</label>
                                                <input type="text" class="form-control" id="judul" name="judul" placeholder="<?= $dataBuku['judul'] ?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="penerbit">Penerbit</label>
                                                <input type="penerbit" class="form-control" id="penerbit" name="penerbit" placeholder="<?= $dataBuku['penerbit'] ?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="pencipta">Pencipta</label>
                                                <input type="text" class="form-control" id="pencipta" name="pencipta" placeholder="<?= $dataBuku['pencipta'] ?>" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="id_petugas">Petugas</label>
                                                <select name="id_petugas" id="id_petugas" class="form-control">
                                                    <option>-- Pilih --</option>
                                                    <?php foreach ($petugas as $dataPetugas) : ?>
                                                        <option value="<?= $datapetugas['id_petugas']  ?>"><?= $dataPetugas['nama_petugas'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nis">NIS Siswa</label>
                                                <input type="number" class="form-control" id="nis" name="nis" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option>-- Pilih --</option>
                                                    <option value="1">Dipinjam</option>
                                                    <option value="2">Dikembalikan</option>
                                                </select>
                                            </div>

                                            <button type="submit" name="submit" class="btn btn-success">Tambah</button>
                                        </form>
=======
                                            <input type="hidden" class="form-control" id="id_buku" name="id_buku" placeholder="<?= $dataBuku['id_buku'] ?>" value="<?= $dataBuku['id_buku'] ?>" class="form-group">
                                            <label for="judul">Judul</label>
                                            <input type="text" class="form-control" id="judul" name="judul" placeholder="<?= $dataBuku['judul'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="penerbit">Penerbit</label>
                                        <input type="penerbit" class="form-control" id="penerbit" name="penerbit" placeholder="<?= $dataBuku['penerbit'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="pencipta">Pencipta</label>
                                        <input type="text" class="form-control" id="pencipta" name="pencipta" placeholder="<?= $dataBuku['pencipta'] ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_petugas">Petugas</label>
                                        <select name="id_petugas" id="id_petugas" class="form-control">
                                            <option>-- Pilih --</option>
                                            <?php foreach ($petugas as $dataPetugas) : ?>
                                                <option value="<?= $datapetugas['id_petugas']  ?>"><?= $dataPetugas['nama_petugas'] ?></option>
                                            <?php endforeach ?>
                                        </select>
>>>>>>> 5f810c462c2e1bd8a5b77c57be1f9193de101ed2
                                    </div>
                                    <div class="form-group">
                                        <label for="nis">NIS Siswa</label>
                                        <input type="number" class="form-control" id="nis" name="nis" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option>-- Pilih --</option>
                                            <option value="dipinjam">Dipinjam</option>
                                            <option value="dikembalikan">Dikembalikan</option>
                                        </select>
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
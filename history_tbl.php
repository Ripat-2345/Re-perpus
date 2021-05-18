<?php
include('./config/functions/functionPeminjaman.php');
$peminjaman = query("SELECT id_peminjaman,judul,nama_petugas,nama_siswa,peminjaman.status FROM peminjaman INNER JOIN buku ON peminjaman.id_buku = buku.id_buku INNER JOIN siswa ON peminjaman.nis = siswa.nis INNER JOIN petugas ON peminjaman.id_petugas = petugas.id_petugas ");
$awalData = 0;
$jumlahDataPerhalaman = 2;
$jumlahData = count(query("SELECT * FROM peminjaman"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = (isset($_GET['halaman']) ? $_GET['halaman'] : 1);

$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;
$peminjaman = query("SELECT id_peminjaman,judul,nama_petugas,nama_siswa,peminjaman.status FROM peminjaman INNER JOIN buku ON peminjaman.id_buku = buku.id_buku INNER JOIN siswa ON peminjaman.nis = siswa.nis INNER JOIN petugas ON peminjaman.id_petugas = petugas.id_petugas Limit $awalData,$jumlahDataPerhalaman");

if (isset($_GET['cari'])) {
    $keyword = $_GET["keyword"];
    $jumlahData = count(query("SELECT id_peminjaman,judul,nama_petugas,nama_siswa,peminjaman.status FROM peminjaman INNER JOIN buku ON peminjaman.id_buku = buku.id_buku INNER JOIN siswa ON peminjaman.nis = siswa.nis INNER JOIN petugas ON peminjaman.id_petugas = petugas.id_petugas Where buku.judul LIKE '%$keyword%' OR nama_petugas LIKE '%$keyword%' OR nama_siswa LIKE '%$keyword%' OR peminjaman.status Like '%$keyword%'"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
    $halamanAktif = (isset($_GET['halaman']) ? $_GET['halaman'] : 1);
    $awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;
    $peminjaman = cari($_GET["keyword"], $awalData, $jumlahDataPerhalaman);
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
                        <h1 class="h3 mb-0 text-gray-800">History</h1>
                    </div>

                    <!--Row-->
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <!-- Simple Tables -->
                            <div class="card">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Tabel History</h6>
                                    <form action="" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-sm" name="keyword" placeholder="Cari">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary" name="cari"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush text-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Petugas</th>
                                                <th>Nama Siswa</th>
                                                <th>Judul Buku</th>
                                                <th>Status</th>


                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($peminjaman as $dataPeminjaman) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $dataPeminjaman['nama_petugas']; ?></td>
                                                    <td><?= $dataPeminjaman['nama_siswa']; ?></td>
                                                    <td><?= $dataPeminjaman['judul']; ?></td>
                                                    <?php if ($dataPeminjaman['status'] == 'Dipinjam') : ?>
                                                        <td>
                                                            <span class="badge badge-danger">
                                                                <?= $dataPeminjaman['status']; ?>
                                                            </span>
                                                        </td>
                                                    <?php endif; ?>
                                                    <?php if ($dataPeminjaman['status'] == 'Dikembalikan') : ?>
                                                        <td>
                                                            <span class="badge badge-success">
                                                                <?= $dataPeminjaman['status']; ?>
                                                            </span>
                                                        </td>
                                                    <?php endif; ?>
                                                    <td><a href="peminjaman_detail.php?id_peminjaman=<?= $dataPeminjaman['id_peminjaman']; ?>" class="btn btn-sm btn-info">Detail</a>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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
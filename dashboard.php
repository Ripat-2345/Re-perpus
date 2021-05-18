<?php
include('./config/conn.php');
if (!isset($_SESSION['login'])) {
  header('location:auth_login.php');
}

if ($_SESSION['level'] == 'siswa') {
  header('location:home.php');
}

$jumlahSiswa = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM siswa"));
$jumlahPetugas = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM petugas"));
$jumlahBuku = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM buku"));
$jumlahPeminjam = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM peminjaman WHERE status = 'Dipinjam'"));

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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!--Row-->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xl font-weight-bold text-uppercase mb-1">Jumlah Siswa</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahSiswa; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-12 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xl font-weight-bold text-uppercase mb-1">Jumlah Petugas</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahPetugas; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-shield fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-12 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xl font-weight-bold text-uppercase mb-1">Jumlah Buku</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jumlahBuku; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book-open fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-12 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xl font-weight-bold text-uppercase mb-1">Buku Dipinjamkan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahPeminjam; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-tags fa-2x text-warning"></i>
                    </div>
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
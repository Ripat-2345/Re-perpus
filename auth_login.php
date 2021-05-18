<?php
include('./config/functions/functionAuth.php');

if (isset($_SESSION['login']) && (isset($_SESSION['level']) == 'admin') || (isset($_SESSION['level']) == 'petugas')) {
    header('location:dashboard.php');
} else if (isset($_SESSION['login']) && (isset($_SESSION['level']) == 'siswa')) {
    header('location:home.php');
}

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $petugasInfo = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username'");
    $siswaInfo = mysqli_query($conn, "SELECT * FROM siswa WHERE username = '$username'");

    if (mysqli_num_rows($petugasInfo) === 1) {

        $row = mysqli_fetch_assoc($petugasInfo);

        if (password_verify($password, $row['password'])) {
            // sessin set
            $_SESSION['login'] = true;
            $_SESSION['nama'] = $row['nama_petugas'];
            $_SESSION['level'] = $row['level'];
            header('location: dashboard.php');
            exit;
        }

        $error = true;
    } else if (mysqli_num_rows($siswaInfo) === 1) {

        $row = mysqli_fetch_assoc($siswaInfo);

        if (password_verify($password, $row['password'])) {
            // sessin set
            $_SESSION['login'] = true;
            $_SESSION['nama'] = $row['nama_siswa'];
            $_SESSION['level'] = $row['level'];
            header('location: home.php');
            exit;
        }

        $error = true;
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
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Container Fluid-->
                <div class="container-login">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-12 col-md-9">
                            <div class="card shadow-sm my-5">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <?php if (isset($error)) : ?>
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    Gagal, mohon periksa lagi username dan password Anda!
                                                </div>
                                            <?php endif; ?>
                                            <div class="login-form">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-4">Login Perpus Tech</h1>
                                                </div>
                                                <form class="user" action="" method="POST">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                                                    </div>
                                                </form>
                                                <hr>
                                                <div class="text-center">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---Container Fluid-->
            </div>

            <footer>
                <div class="container">
                    <div class="copyright text-center my-auto">
                        <span>copyright &copy; <script>
                                document.write(new Date().getFullYear());
                            </script> - developed by
                            <b><a href="https://indrijunanda.gitlab.io/" target="_blank">Waldan</a></b>
                        </span>
                    </div>
                </div>
            </footer>
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
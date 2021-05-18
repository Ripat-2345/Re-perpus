<?php
include('./config/conn.php');

if (!isset($_SESSION['login'])) {
    header('location:auth_login.php');
}

if ($_SESSION['level'] == 'siswa') {
    header('location:home.php');
}

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] =  $row;
    }

    return $rows;
}

function detail($id)
{

    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM petugas WHERE id_petugas = '$id'");

    $row = mysqli_fetch_assoc($result);

    return $row;
}

function tambah($request)
{
    global $conn;

    $nama_petugas = htmlspecialchars($request['nama_petugas']);
    $username = htmlspecialchars($request['username']);
    $password = password_hash(htmlspecialchars($request['password']), PASSWORD_DEFAULT);
    $level = htmlspecialchars($request['level']);

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username'"))) {
        echo "<script>
                alert('Username sudah ada!');
            </script>";
        return false;
    }

    $query = "INSERT INTO petugas VALUES
            ('','$username','$password','$nama_petugas','$level',Now(),Now())";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($request)
{
    global $conn;

    $id_petugas = $request['id_petugas'];
    $nama_petugas = htmlspecialchars($request['nama_petugas']);
    $username = htmlspecialchars($request['username']);
    $password = password_hash(htmlspecialchars($request['password']), PASSWORD_DEFAULT);
    $level = htmlspecialchars($request['level']);
    $created_at = $request['created_at'];

    $query = "UPDATE petugas SET
            nama_petugas = '$nama_petugas',
            username = '$username',
            password = '$password',
            level = '$level',
            created_at = '$created_at',
            updated_at = Now()
            WHERE id_petugas = $id_petugas
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM petugas WHERE id_petugas = $id");

    return mysqli_affected_rows($conn);
}

function cari($keyword, $awalData, $jumlahDataPerhalaman)
{

    $query = "SELECT * FROM petugas Where nama_petugas LIKE '%$keyword%' OR username LIKE '%$keyword%' OR petugas.level LIKE '%$keyword%' Limit $awalData,$jumlahDataPerhalaman";

    return query($query);
}

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
    $result = mysqli_query($conn, "SELECT * FROM siswa WHERE id_siswa = '$id'");

    $row = mysqli_fetch_assoc($result);

    return $row;
}

function tambah($request)
{
    global $conn;

    $nis = htmlspecialchars($request['nis']);
    $nama_siswa = htmlspecialchars($request['nama_siswa']);
    $kelas = htmlspecialchars($request['kelas']);
    $no_telp = htmlspecialchars($request['no_telp']);
    $username = $nama_siswa;
    $password = password_hash($nis, PASSWORD_DEFAULT);
    $level = 'siswa';

    $query = "INSERT INTO siswa VALUES
            ('','$nis','$nama_siswa','$kelas','$no_telp','$username','$password','$level',Now(),Now())";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($request)
{
    global $conn;

    $id_siswa = $request['id_siswa'];
    $nis = htmlspecialchars($request['nis']);
    $nama_siswa = htmlspecialchars($request['nama_siswa']);
    $kelas = htmlspecialchars($request['kelas']);
    $no_telp = htmlspecialchars($request['no_telp']);
    $username = $nama_siswa;
    $password = password_hash($nis, PASSWORD_DEFAULT);
    $level = 'siswa';
    $created_at = $request['created_at'];

    $query = "UPDATE siswa SET
            nis = '$nis',
            nama_siswa = '$nama_siswa',
            kelas = '$kelas',
            no_telp = '$no_telp',
            username = '$username',
            password = '$password',
            level = '$level',
            created_at = '$created_at',
            updated_at = Now()
            WHERE id_siswa = $id_siswa
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa = $id");

    return mysqli_affected_rows($conn);
}

function cari($keyword, $awalData, $jumlahDataPerhalaman)
{

    $query = "SELECT * FROM siswa Where nama_siswa LIKE '%$keyword%' OR nis LIKE '%$keyword%' OR kelas LIKE '%$keyword%' OR username Like '%$keyword%' Limit $awalData,$jumlahDataPerhalaman";

    return query($query);
}

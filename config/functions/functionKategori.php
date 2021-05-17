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
    $result = mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori = '$id'");

    $row = mysqli_fetch_assoc($result);

    return $row;
}

function tambah($request)
{
    global $conn;

    $nama_kategori = htmlspecialchars($request['nama_kategori']);

    $query = "INSERT INTO kategori VALUES
            ('','$nama_kategori',Now(),Now())";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($request)
{
    global $conn;

    $id_kategori = $request['id_kategori'];
    $nama_kategori = htmlspecialchars($request['nama_kategori']);
    $created_at = $request['created_at'];

    $query = "UPDATE kategori SET
            nama_kategori = '$nama_kategori',
            created_at = '$created_at',
            updated_at = Now()
            WHERE id_kategori = $id_kategori
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM kategori WHERE id_kategori = $id");

    return mysqli_affected_rows($conn);
}

function cari($keyword, $awalData, $jumlahDataPerhalaman)
{

    $query = "SELECT * FROM kategori Where nama_kategori LIKE '%$keyword%' Limit $awalData,$jumlahDataPerhalaman";

    return query($query);
}

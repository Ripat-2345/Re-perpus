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
    $result = mysqli_query($conn, "SELECT * FROM buku INNER JOIN kategori ON buku.id_kategori = kategori.id_kategori WHERE id_buku = '$id'");

    $row = mysqli_fetch_assoc($result);

    return $row;
}

function tambah($request)
{
    global $conn;

    $judul = htmlspecialchars($request['judul']);
    $pencipta = htmlspecialchars($request['pencipta']);
    $penerbit = htmlspecialchars($request['penerbit']);
    $id_kategori = htmlspecialchars($request['id_kategori']);
    $jumlah_buku = htmlspecialchars($request['jumlah_buku']);

    $query = "INSERT INTO buku VALUES
            ('','$judul','$penerbit','$pencipta','$id_kategori','$jumlah_buku',Now(),Now())";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($request)
{
    global $conn;
    $id_buku = $request['id_buku'];
    $judul = htmlspecialchars($request['judul']);
    $penerbit = htmlspecialchars($request['penerbit']);
    $pencipta = htmlspecialchars($request['pencipta']);
    $id_kategori = htmlspecialchars($request['id_kategori']);
    $jumlah_buku = htmlspecialchars($request['jumlah_buku']);
    $created_at = $request['created_at'];

    $query = "UPDATE buku SET
            judul = '$judul',
            penerbit = '$penerbit',
            pencipta = '$pencipta',
            id_kategori = '$id_kategori',
            jumlah_buku = '$id_kategori',
            created_at = '$created_at',
            updated_at = Now()
            WHERE id_buku = $id_buku
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM buku WHERE id_buku = $id");

    return mysqli_affected_rows($conn);
}

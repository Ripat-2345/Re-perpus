<?php
include('./config/conn.php');

if (!isset($_SESSION['login'])) {
    header('location:auth_login.php');
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

function cari($keyword, $awalData, $jumlahDataPerhalaman)
{

    $query = "SELECT * FROM buku INNER JOIN kategori ON buku.id_kategori = kategori.id_kategori Where judul Like '%$keyword%' Limit $awalData,$jumlahDataPerhalaman";

    return query($query);
}

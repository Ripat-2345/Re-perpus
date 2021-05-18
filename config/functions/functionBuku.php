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
    $deskripsi = htmlspecialchars($request['deskripsi']);
    $penerbit = htmlspecialchars($request['penerbit']);
    $id_kategori = htmlspecialchars($request['id_kategori']);
    $jumlah_buku = htmlspecialchars($request['jumlah_buku']);

    $gambar = upload();

    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO buku VALUES
            ('','$gambar','$judul','$penerbit','$pencipta','$deskripsi','$id_kategori','$jumlah_buku',Now(),Now())";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "<script>
                alert('Silahkan Upload Gambar!');
            </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Ekstensi gambar harus jpg/jpeg/png');
            </script>";
        return false;
    }


    if ($ukuranFile > 5000000) {
        echo "<script>
                alert('Ukuran file gambar terlalu besar!');
            </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'app/img/' . $namaFileBaru);

    return $namaFileBaru;
}

function ubah($request)
{
    global $conn;
    $id_buku = $request['id_buku'];
    $judul = htmlspecialchars($request['judul']);
    $penerbit = htmlspecialchars($request['penerbit']);
    $pencipta = htmlspecialchars($request['pencipta']);
    $deskripsi = htmlspecialchars($request['deskripsi']);
    $id_kategori = htmlspecialchars($request['id_kategori']);
    $jumlah_buku = htmlspecialchars($request['jumlah_buku']);
    $created_at = $request['created_at'];
    $gambarLama = htmlspecialchars($request['gambarLama']);

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE buku SET
            gambar = '$gambar',
            judul = '$judul',
            penerbit = '$penerbit',
            pencipta = '$pencipta',
            deskripsi = '$deskripsi',
            id_kategori = '$id_kategori',
            jumlah_buku = '$jumlah_buku',
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

function cari($keyword, $awalData, $jumlahDataPerhalaman)
{

    $query = "SELECT * FROM buku INNER JOIN kategori ON buku.id_kategori = kategori.id_kategori Where judul Like '%$keyword%' OR nama_kategori LIKE '%$keyword%' Limit $awalData,$jumlahDataPerhalaman";

    return query($query);
}

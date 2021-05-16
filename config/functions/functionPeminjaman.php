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
        $result = mysqli_query($conn, "SELECT id_peminjaman,peminjaman.created_at,judul,penerbit,pencipta,nama_petugas,nama_siswa,peminjaman.status,peminjaman.nis,siswa.no_telp FROM peminjaman INNER JOIN buku ON peminjaman.id_buku = buku.id_buku INNER JOIN siswa ON peminjaman.nis = siswa.nis INNER JOIN petugas ON peminjaman.id_petugas = petugas.id_petugas Where id_peminjaman = '$id' ");

        $row = mysqli_fetch_assoc($result);

        return $row;
    }

    function tambah($request)
    {
        global $conn;

        $id_petugas = htmlspecialchars($request['id_petugas']);
        $nis = htmlspecialchars($request['nis']);
        $id_buku = htmlspecialchars($request['id_buku']);
        $status = htmlspecialchars($request['status']);
        $query = "INSERT Into peminjaman Values
                ('','$id_petugas','$nis','$id_buku',Now(),Now(),'$status')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function ubah($request)
    {
        global $conn;
        $status = htmlspecialchars($request['status']);
        $id_peminjaman = htmlspecialchars($request['id_peminjaman']);
        $created_at = $request['created_at'];

        $query = "UPDATE peminjaman SET
                status     ='$status',
                created_at = '$created_at',
                updated_at = Now()
                WHERE id_peminjaman = $id_peminjaman
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

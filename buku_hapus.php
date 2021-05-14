<?php
include('./config/functions/functionBuku.php');

$id = $_GET['id_buku'];

if (hapus($id) > 0) {
    echo "
    <script>
        alert('Data berhasil dihapus!');
        document.location.href = 'buku_tbl.php';
    </script>
";
} else {
    echo "
    <script>
        alert('Data gagal dihapus!');
        document.location.href = 'buku_detail.php';
    </script>
";
}

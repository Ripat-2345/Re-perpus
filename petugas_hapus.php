<?php
include('./config/functions/functionPetugas.php');

$id = $_GET['id_petugas'];

if (hapus($id) > 0) {
    echo "
    <script>
        alert('Data berhasil dihapus!');
        document.location.href = 'petugas_tbl.php';
    </script>
";
} else {
    echo "
    <script>
        alert('Data gagal dihapus!');
        document.location.href = 'petugas_detail.php';
    </script>
";
}

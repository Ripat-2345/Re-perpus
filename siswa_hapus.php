<?php
include('./config/functions/functionSiswa.php');

$id = $_GET['id_siswa'];

if (hapus($id) > 0) {
    echo "
    <script>
        alert('Data berhasil dihapus!');
        document.location.href = 'siswa_tbl.php';
    </script>
";
} else {
    echo "
    <script>
        alert('Data gagal dihapus!');
        document.location.href = 'siswa_detail.php';
    </script>
";
}

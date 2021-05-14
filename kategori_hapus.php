<?php
include('./config/functions/functionKategori.php');

$id = $_GET['id_kategori'];

if (hapus($id) > 0) {
    echo "
    <script>
        alert('Data berhasil dihapus!');
        document.location.href = 'kategori_tbl.php';
    </script>
";
} else {
    echo "
    <script>
        alert('Data gagal dihapus!');
        document.location.href = 'kategori_detail.php';
    </script>
";
}

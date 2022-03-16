<?php

$id = $_GET['id'];

$hapus_pengiriman = mysqli_query($koneksi, "DELETE FROM tbl_pengiriman WHERE id_order='$id' ");
$hapus_detail = mysqli_query($koneksi, "DELETE FROM tbl_detail_order WHERE id_order='$id' ");
$hapus_order = mysqli_query($koneksi, "DELETE FROM tbl_transaksi WHERE id_order='$id' ");

if($hapus_order) {
    ?>
    <script>
        alert('Berhasil menghapus data order');
        window.location.href="index.php?page=transaksi";
    </script>
<?php
}
?>
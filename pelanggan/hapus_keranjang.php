<?php

$id = $_GET['id'];

if($id=="all") {
    $hapus = mysqli_query($koneksi, "DELETE FROM tbl_keranjang WHERE id_pelanggan='$_SESSION[id_pelanggan]'");
} else {
    $hapus = mysqli_query($koneksi, "DELETE FROM tbl_keranjang WHERE kd_keranjang='$id'");
}
if($hapus){
?>
    <script>
        alert('Produk Berhasil dihapus dari keranjang');
        window.location.href='index.php?page=keranjang';
    </script>
<?php
} else {
    ?>
    <script>
        alert('Produk Gagal dihapus dari keranjang');
    </script>
<?php
}
?>
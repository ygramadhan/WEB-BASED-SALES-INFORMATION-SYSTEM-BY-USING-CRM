<?php

$pelanggan = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan WHERE id_pelanggan='$_SESSION[id_pelanggan]'");
$data_pelanggan = mysqli_fetch_array($pelanggan);

$poin = mysqli_query($koneksi, "SELECT * FROM tbl_reward");
$data_poin = mysqli_fetch_array($poin);

$nominal = $data_pelanggan['poin']*$data_poin['harga_poin'];

$ubah = mysqli_query($koneksi, "UPDATE tbl_pelanggan SET nominal_poin='$nominal', poin=0 WHERE id_pelanggan='$_SESSION[id_pelanggan]'");

if($ubah) {
    ?>
    <script>
        window.location.href="index.php?page=keranjang";
    </script>
<?php
}
?>
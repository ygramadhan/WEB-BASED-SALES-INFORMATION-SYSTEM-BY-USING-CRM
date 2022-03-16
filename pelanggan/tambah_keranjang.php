<?php

$id = $_GET['id'];

$produk = mysqli_query($koneksi,"SELECT * FROM tbl_produk where kd_produk='$id' ");
$data_produk = mysqli_fetch_array($produk);

//cek diskon
$diskon = $data_produk['harga'] * $data_produk['diskon']/100;
$harga = $data_produk['harga']-$diskon;

$simpan = mysqli_query($koneksi, "INSERT INTO tbl_keranjang (kd_keranjang, id_pelanggan, kd_produk, jml_pcs, jml_byr) VALUES (null, '$_SESSION[id_pelanggan]','$id',1,'$harga')");

if($simpan) {
?>
    <script>
        alert('Produk Berhasil ditambahkan ke keranjang');
        window.location.href='index.php?page=keranjang';
    </script>
<?php
} else {
    ?>
    <script>
        alert('Produk Gagal ditambahkan ke keranjang ! Coba lagi nanti');
    </script>
<?php
}
?>
<?php

$id=$_GET['id'];

$ubah = mysqli_query($koneksi, "UPDATE tbl_produk SET status=0 WHERE kd_produk='$id'");

if($ubah){
    ?>
    <script>
        alert('Produk Berhasil Di turunkan dari Hot Produk');
        window.location.href="index.php?page=produk&view=tabel";
    </script>
<?php
} else {
    ?>
    <script>
        alert('Produk gagal di turunkan dari Hot Produk');
        window.location.href="index.php?page=produk&view=tabel";
    </script>
<?php
}

?>
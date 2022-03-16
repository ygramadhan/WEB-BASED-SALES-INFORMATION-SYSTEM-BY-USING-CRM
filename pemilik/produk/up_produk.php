<?php

$id=$_GET['id'];

$ubah = mysqli_query($koneksi, "UPDATE tbl_produk SET status=1 WHERE kd_produk='$id'");

if($ubah){
    ?>
    <script>
        alert('Produk Berhasil di Up');
        window.location.href="index.php?page=produk&view=tabel";
    </script>
<?php
} else {
    ?>
    <script>
        alert('Produk gagal di Up');
        window.location.href="index.php?page=produk&view=tabel";
    </script>
<?php
}

?>
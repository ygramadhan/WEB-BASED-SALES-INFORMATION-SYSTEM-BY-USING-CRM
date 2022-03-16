<?php

$id = $_GET['id'];

$ubah = mysqli_query($koneksi, "UPDATE tbl_transaksi SET status=4 WHERE id_order='$id'");

if($ubah){
    ?>
    <script>
        window.location.href="index.php?page=pengiriman";
    </script>
<?php
}
?>
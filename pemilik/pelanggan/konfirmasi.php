<?php

$id = $_GET['id'];

$konfirmasi = mysqli_query($koneksi, "UPDATE tbl_pelanggan SET status_pelanggan=1 WHERE id_pelanggan='$id'");

if($konfirmasi) {
    ?>
        <script>
            alert("Pelanggan berhasil dikonfirmasi");
            window.location.href='index.php?page=pelanggan';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Pelanggan gagal dikonfirmasi");
            window.location.href='index.php?page=pelanggan';
        </script>
<?php
}
?>
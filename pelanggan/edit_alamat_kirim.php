<?php
    if(isset($_POST['simpan'])){

        $alamat = $_POST['alamat'];
        $id_wilayah = $_POST['id_wilayah'];

        $ubah = mysqli_query($koneksi, "UPDATE tbl_pelanggan SET alamat='$alamat', id_wilayah='$id_wilayah' WHERE id_pelanggan='$_SESSION[id_pelanggan]'");
    if($ubah) {
    ?>
        <script>
            window.location.href="index.php?page=keranjang";
        </script>
    <?php
    }
}
?>
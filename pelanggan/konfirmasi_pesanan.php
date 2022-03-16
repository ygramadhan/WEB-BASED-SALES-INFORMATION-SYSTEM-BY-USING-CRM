<?php

$id = $_GET['id'];

$ubah_pesanan = mysqli_query($koneksi, "UPDATE tbl_transaksi SET status=6 WHERE id_order='$id'");

if($ubah_pesanan) {

    //hitung poin 
    $hitung_poin = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi WHERE id_order='$id'");
    $data_hitung_poin = mysqli_fetch_array($hitung_poin);
    $jumlah_bayar = $data_hitung_poin['jml_byr'];
    $ongkir = $data_hitung_poin['ongkir'];

    $total_belanja = $jumlah_bayar-$ongkir;

    $poin = floor($total_belanja/10000);

    $ambil_poin = mysqli_query($koneksi,"SELECT * FROM tbl_pelanggan WHERE id_pelanggan='$_SESSION[id_pelanggan]'");
    $data_poin = mysqli_fetch_array($ambil_poin);

    $total_poin = $data_poin['poin']+$poin;
    $input_poin = mysqli_query($koneksi, "UPDATE tbl_pelanggan SET poin='$total_poin' WHERE id_pelanggan='$_SESSION[id_pelanggan]'");

    if($input_poin) {
        //var_dump($total_poin);
    ?>
    <script>
        alert('Selamat, kamu berhasil mendapat Reward poin');
        window.location.href="index.php?page=home";
    </script>
    <?php
    } else {
    ?>
    <script>
        alert('Selamat, kamu berhasil mendapat Reward poin');
        window.location.href="index.php?page=home";
    </script>
    <?php
    }
}
?>
<!--Hero Section-->
<div class="hero-section hero-background">
        <h1 class="page-title">Detail Order</h1>
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
                <li class="nav-item"><span class="current-page">Detail Order</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain shopping-cart">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">


                <!--Cart Table-->
                <div class="shopping-cart-container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="box-title">Detail Order</h3>
                            <form class="shopping-cart-form" action="" method="post" enctype="multipart/form-data">
                            <?php
                                
                                $id = $_GET['id'];

                                    $order = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi JOIN tbl_pelanggan ON tbl_transaksi.id_pelanggan=tbl_pelanggan.id_pelanggan WHERE id_order='$id'");
                                    $data_order = mysqli_fetch_array($order);

                                    $pengiriman = mysqli_query($koneksi, "SELECT * FROM tbl_pengiriman WHERE id_order='$id'");
                                    $data_pengiriman = mysqli_fetch_array($pengiriman);


                                    if($data_order['status']==1) {
                                        $status= "Belum Bayar";
                                        $tgl_byr = "-";
                                    } elseif($data_order['status']==2) {
                                        $status= "Menunggu Validasi Admin";
                                        $tgl_byr = tanggal_indo($data_order['tgl_byr']);
                                    } elseif($data_order['status']==3) {
                                        $status= "Sedang dikemas";
                                        $tgl_byr = tanggal_indo($data_order['tgl_byr']);
                                    } elseif($data_order['status']==4) {
                                        $status= "Sedang dikirim";
                                        $tgl_byr = tanggal_indo($data_order['tgl_byr']);
                                    } else {
                                        $status = "Paket telah sampai";
                                        $tgl_byr = tanggal_indo($data_order['tgl_byr']);
                                    }
                                ?>
                                <label>ID Order</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?=$data_order['id_order']?><br>
                                <label>Nama Pemesan</label> : <?=$data_order['nama_pelanggan']?><br>
                                <label>Tanggal Order</label> &nbsp;&nbsp;&nbsp;: <?=tanggal_indo($data_order['tgl_pemesanan'])?><br>
                                <label>Pembayaran</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$data_order['jenis_byr']?><br>
                                <label>Tanggal Bayar</label> &nbsp;&nbsp;&nbsp;: <?=$tgl_byr?><br>
                                
                                <label>Alamat Tujuan</label> &nbsp;&nbsp;&nbsp;: <?=$data_pengiriman['alamat_pengiriman']?><br>
                                
                                <table>
                                
                                    <tr>
                                        <th class="product-name">Nama Produk</th>
                                        <th class="product-price">Harga</th>
                                        <th class="product-quantity">Kuantiti</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                    
                                    <tbody>
                                    <?php


                                    $keranjang = mysqli_query($koneksi, "SELECT * FROM tbl_detail_order JOIN tbl_produk ON tbl_detail_order.kd_produk = tbl_produk.kd_produk WHERE id_order='$id'");
                                    $cek_keranjang = mysqli_num_rows($keranjang);

                                    $pelanggan = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan JOIN tbl_wilayah ON tbl_pelanggan.id_wilayah=tbl_wilayah.id_wilayah WHERE id_pelanggan='$data_order[id_pelanggan]'");
                                    $data_pelanggan = mysqli_fetch_array($pelanggan);

                                    $total=0;
                                    if($cek_keranjang==0) {
                                        echo "<tr><td colspan='4'>Keranjang masih kosong</td></tr>";
                                    } else {


                                    while($data_keranjang = mysqli_fetch_array($keranjang)) {
                                    
                                        if($data_keranjang['diskon']==0)
                                        {
                                            $harga = $data_keranjang['harga'];
                                            $harga_show = rupiah($harga);
                                            $harga_coret = "";
                                            $diskon ="";
                                            $total = $data_keranjang['pcs']*$harga;
                                        } else {
                                            $hit_diskon = $data_keranjang['diskon']*$data_keranjang['harga']/100;
                                            $harga = $data_keranjang['harga']-$hit_diskon;
                                            $harga_show = rupiah($harga);
                                            $harga_coret = rupiah($data_keranjang['harga']);
                                            $diskon = "Diskon ".$data_keranjang['diskon']." %";
                                            $total = $data_keranjang['pcs']*$harga;
                                        }

                                        $jml_byr[] = $data_keranjang['jml_byr'];

                                    ?>
                                    <tr class="cart_item">
                                        <td class="product-thumbnail" data-title="Product Name">
                                            <a class="prd-thumb" href="#">
                                                <figure><img width="113" height="113" src="../admin/produk/pict/<?=$data_keranjang['gambar']?>" alt="shipping cart"></figure>
                                            </a>
                                            <a class="prd-name" href="#" onclick="fungsi_total()"><?=$data_keranjang['nama_produk']?></a>
                                            <div class="action">
                                                <a href="index.php?page=edit_keranjang&id=<?=$data_keranjang['kd_keranjang']?>" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <a href="index.php?page=hapus_keranjang&id=<?=$data_keranjang['kd_keranjang']?>" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><?=$harga_show?><input type="hidden" id="harga" value="<?=$data_keranjang['harga']?>"></ins>
                                                <del><span class="price-amount"><?=$harga_coret?></span></del>
                                            </div>
                                        </td>
                                        <td class="product-quantity" data-title="Quantity">
                                            <div class="quantity-box type1">
                                                <div class="qty-input">
                                                    <input type="number" id="qty" name="qty1" value="<?=$data_keranjang['pcs']?>" data-max_value="20" data-min_value="1" data-step="1" readonly>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Total">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount" id="subtotal"><?=rupiah($total)?></span></ins>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    $jml_byr_show = array_sum($jml_byr);

                                    //ongkir 
                                    $ongkir = $data_order['jml_byr']-$jml_byr_show;
    
                                }
                                


                                    ?>
                                    <tr class="cart_item wrap-buttons">
                                        <td><b>ONGKIR</b></td>
                                        <td></td>
                                        <td></td>
                                        <td><b><?=rupiah($ongkir)?></b></td>
                                    </tr>
                                    
                                    <tr class="cart_item wrap-buttons">
                                        <td><b>TOTAL</b></td>
                                        <td></td>
                                        <td></td>
                                        <td><b><?=rupiah($data_order['jml_byr'])?></b></td>
                                    </tr>
                                    </tbody>
                                </table>                            
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

if(isset($_POST['bayar'])) {

    $namaFile = $_FILES['bukti']['name'];
    $namaSementara = $_FILES['bukti']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    $dirUpload = 'bukti';

    // pindahkan file
    $terupload = move_uploaded_file($namaSementara, "$dirUpload/$namaFile");

    $tgl_bayar = date('Y-m-d');
    $id_order = $_POST['id_order'];

    if($terupload)
    {
        $ubah = mysqli_query($koneksi, "UPDATE tbl_transaksi SET tgl_byr='$tgl_bayar', bukti_byr='$namaFile', status=2 WHERE id_order='$id_order'");

        if($ubah) {
            ?>
            <script>
                alert('Pembayaran Berhasil, silahkan tunggu konfirmasi admin');
                window.location.href="index.php?page=pesanan_saya";
            </script>
        <?php
        } else {
        ?>
          <script>
                alert('Pembayaran Gagal, silahkan coba lagi nanti');
                window.location.href="index.php?page=pesanan_saya";
            </script>
        <?php
        }
    }

}
?>
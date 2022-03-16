<!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Keranjang Saya</h1>
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index.html" class="permal-link">Beranda</a></li>
                <li class="nav-item"><span class="current-page">Keranjang Saya</span></li>
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
                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="box-title">Keranjang Saya</h3>
                            <form class="shopping-cart-form" action="" method="post">
                                <table class="shop_table cart-form">
                                    <thead>
                                    <tr>
                                        <th class="product-name">Nama Produk</th>
                                        <th class="product-price">Harga</th>
                                        <th class="product-quantity">Kuantiti</th>
                                        <th class="product-quantity">Berat</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $keranjang = mysqli_query($koneksi, "SELECT * FROM tbl_keranjang JOIN tbl_produk ON tbl_keranjang.kd_produk = tbl_produk.kd_produk WHERE id_pelanggan='$_SESSION[id_pelanggan]'");
                                    $cek_keranjang = mysqli_num_rows($keranjang);

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
                                            $total = $data_keranjang['jml_pcs']*$harga;
                                        } else {
                                            $hit_diskon = $data_keranjang['diskon']*$data_keranjang['harga']/100;
                                            $harga = $data_keranjang['harga']-$hit_diskon;
                                            $harga_show = rupiah($harga);
                                            $harga_coret = rupiah($data_keranjang['harga']);
                                            $diskon = "Diskon ".$data_keranjang['diskon']." %";
                                            $total = $data_keranjang['jml_pcs']*$harga;
                                        }

                                        $berat = $data_keranjang['berat'] * $data_keranjang['jml_pcs'];

                                    ?>
                                    <tr class="cart_item">
                                        <td class="product-thumbnail" data-title="Product Name">
                                            <a class="prd-thumb" href="index.php?page=detail_produk&id=<?=$data_keranjang['kd_produk']?>">
                                                <figure><img width="113" height="113" src="../admin/produk/pict/<?=$data_keranjang['gambar']?>" alt="shipping cart"></figure>
                                            </a>
                                            <a class="prd-name" href="index.php?page=detail_produk&id=<?=$data_keranjang['kd_produk']?>" onclick="fungsi_total()"><?=$data_keranjang['nama_produk']?></a>
                                            <div class="action">
                                                <a href="index.php?page=edit_keranjang&id=<?=$data_keranjang['kd_keranjang']?>" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <a href="index.php?page=hapus_keranjang&id=<?=$data_keranjang['kd_keranjang']?>" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><?=$harga_show?><input type="hidden" id="harga" value="<?=$harga?>"></ins>
                                                <del><span class="price-amount"><?=$harga_coret?></span></del>
                                            </div>
                                        </td>
                                        <td class="product-quantity" data-title="Quantity">
                                            <div class="quantity-box type1">
                                                <div class="qty-input">
                                                    <input type="text" id="qty" name="qty1" value="<?=$data_keranjang['jml_pcs']?>" readonly> 
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Berat">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><?=$berat?> gr</ins></span>
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
                                }

                                    $alamat_pengiriman = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan JOIN tbl_wilayah ON tbl_pelanggan.id_wilayah=tbl_wilayah.id_wilayah WHERE id_pelanggan='$_SESSION[id_pelanggan]'");
                                    $data_alamat_pengiriman = mysqli_fetch_array($alamat_pengiriman);

            
                                    //----------- subtotal keranjang item --------------
                                    $keranjang1 = mysqli_query($koneksi, "SELECT jml_byr FROM tbl_keranjang WHERE id_pelanggan='$_SESSION[id_pelanggan]'");
                                    $cek_aja = mysqli_num_rows($keranjang1);
            
                                    if($cek_aja==0) {
                                        $subtotal=0;
                                        $subtotal_show=0;
                                        //$total_byr=0;
                                    } else {
            
                                        while($data_keranjang1 = mysqli_fetch_array($keranjang1)){
                
                                            $subtotal[] = $data_keranjang1['jml_byr'];
                                        }
                                        $subtotal_show = array_sum($subtotal);
                                    }

                                    // ---------------- TOTAL BERAT ---------------
                                    $keranjang2 = mysqli_query($koneksi, "SELECT jml_pcs, berat FROM tbl_keranjang JOIN tbl_produk ON tbl_keranjang.kd_produk=tbl_produk.kd_produk WHERE id_pelanggan='$_SESSION[id_pelanggan]'");
                                    $cek_aja2 = mysqli_num_rows($keranjang2);
            
                                    if($cek_aja2==0) {
                                        $total_berat=0;
                                        $total_ongkir = 0;
                                    } else {
            
                                        while($data_keranjang2 = mysqli_fetch_array($keranjang2)){
                                            $hit_berat = $data_keranjang2['jml_pcs'] * $data_keranjang2['berat'];
                
                                            $total_berat[] = $hit_berat;
                                        }
                                        
                                        $total_berat_show = array_sum($total_berat);
               
                                        $total_berat = ceil($total_berat_show/1000);
                                        $total_ongkir = $data_alamat_pengiriman['ongkir'] * $total_berat;
                                    }                                    

                                    // ------------- VOUCHER POIN -------------
                                    if($data_alamat_pengiriman['poin']==0) {
                                        if($data_alamat_pengiriman['nominal_poin']==0) {
                                            $poin = 0;
                                            $tukar_poin = 0;
                                            $tukar_poin_show = "<font color='red'>0</font>";
                                        } else {
                                            $poin = 0;
                                            $tukar_poin = $data_alamat_pengiriman['nominal_poin'];
                                            $tukar_poin_show = "<font color='red'>-".rupiah($data_alamat_pengiriman['nominal_poin'])."</font>";
                                        }                                            
                                    } else {
                                        $poin = $data_alamat_pengiriman['poin'];
                                        $tukar_poin = 0;
                                        $tukar_poin_show = "<a href='index.php?page=tukar_poin' class='btn btn-success'>Tukar Poin</a>";
                                    }


                                    $total_byr = ($subtotal_show + $total_ongkir) - $tukar_poin;

                                    ?>
                                    <tr>
                                        <td colspan="3" class="product-subtotal" data-title="Total">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount" id="subtotal">TOTAL </span></ins>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td class="product-subtotal" data-title="Total">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount" id="subtotal"><?=rupiah($subtotal_show)?></span></ins>
                                                <input type="hidden" name="subtotal" value="<?=$subtotal_show?>">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="product-subtotal" data-title="Total">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount" id="subtotal">TOTAL ONGKIR </span></ins>
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Total">
                                            <div class="subtotal-line">
                                                <b class="stt-name">Total Berat <span class="sub">(<?=$total_berat?> kg)</span></b>
                                            </div>
                                        </td>                                        
                                        <td class="product-subtotal" data-title="Total">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount" id="subtotal"><?=rupiah($total_ongkir)?></span></ins>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                    <input type="hidden" name="jml_ongkir" value="<?=$total_ongkir?>">
                                    <tr>
                                        <td colspan="3" class="product-subtotal" data-title="Total">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount" id="subtotal">VOUCHER POIN</span></ins>
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Total">
                                            <div class="subtotal-line">
                                                <b class="stt-name"><span class="sub">(<?=$poin?> poin)</span></b>
                                            </div>
                                        </td>                                        
                                        <td class="product-subtotal" data-title="Total">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount" id="subtotal"><?=$tukar_poin_show?></span></ins>
                                                <input type="hidden" name="subtotal" value="<?=$subtotal_show?>">
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="3" class="product-subtotal" data-title="Total">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount" id="subtotal">TOTAL BAYAR </span></ins>
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Total">
                                        </td>                                        
                                        <td class="product-subtotal" data-title="Total">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount" id="subtotal"><?=rupiah($total_byr)?></span></ins>
                                                <input type="hidden" name="total_byr" value="<?=$total_byr?>">
                                            </div>
                                        </td>
                                    </tr>                                    
                                    <tr class="cart_item wrap-buttons">
                                        <td class="wrap-btn-control" colspan="5">
                                            <a class="btn back-to-shop" href="index.php?page=home">Kembali Berbelanja</a>
                                            <a href="index.php?page=hapus_keranjang&id=all" class="btn btn-clear" type="reset">Hapus Semua</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                            <div class="shpcart-subtotal-block">
                                <div class="subtotal-line">
                                    <b class="stt-name">Alamat Pengiriman :</b><span class="stt-price"><a href="#" class="edit" data-toggle="modal" data-target="#editAlamat"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                </div>
                                <div class="subtotal-line"> 
                                    <b class="stt-name"><input type="hidden" name="alamat_pengiriman" value="<?=$data_alamat_pengiriman['alamat']?>"><span class="sub"><?=$data_alamat_pengiriman['alamat']?></span></b>
                                </div>
                                <div class="subtotal-line">
                                    <b class="stt-name">Ongkir /kg</b>
                                    <span class="stt-price" id="ongkir">
                                    <input type="hidden" value="<?=$data_alamat_pengiriman['ongkir']?>" ><?=rupiah($data_alamat_pengiriman['ongkir'])?></span>
                                </div>
                                <div class="subtotal-line">
                                    <b class="stt-name">KURIR </b> <br>
                                    <select name="kurir" required>
                                        <option value="JNE">JNE - Reguler</option>
                                        <option value="JNT">JNT - Reguler</option>
										<option value="Antar-Jemput">ANTAR-JEMPUT (Desa Bojong)</option>
                                    </select>
                                </div>
                                <div class="subtotal-line">
                                    <b class="stt-name">METODE PEMBAYARAN </b> <br>
                                    <select name="jenis_byr" required>
                                         <option value="TF">BRI an EKA : 427001043935532</option>
                                        <option value="e_wallet">OVO : 0822-1809-6202</option>
										<option value="e_wallet">GOPAY : 0822-1809-6202</option>
										<option value="e_wallet">LINKAJA : 0822-1809-6202</option>
                                    </select>
                                </div>
                                
                                <div class="btn-checkout">
                                    <button type="submit" name="cekout" class="btn checkout">Checkout</button>
                                </div>
                                <p class="pickup-info"><b>Pengiriman Gratis</b> se-wilayah Desa Bojong</p>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript">
		function fungsi_total() {
        
		var qty = parseInt(document.getElementById('qty').value);
		var harga = parseInt(document.getElementById('harga').value);

		var jumlah_harga = qty * harga;

		document.getElementById("subtotal").innerHTML = "Rp." + jumlah_harga;
        //alert('Good' + jumlah_harga);
		}

	</script>

<!-- Modal Edit Alamat -->
<div class="modal fade" id="editAlamat" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSayaLabel">Edit Alamat Pengiriman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $pelanggan = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan WHERE id_pelanggan='$_SESSION[id_pelanggan]'");
                $data_pelanggan = mysqli_fetch_array($pelanggan);
                ?>
                <form action="index.php?page=edit_alamat_kirim" method="post">
                    <div class="row">
                        <div class="col-sm-3"><label for="fid-name">Alamat Pengiriman</label></div>
                        <div class="col-sm-9"><textarea cols="20" rows="3" class="form-control" id="nama" name="alamat" required><?=$data_pelanggan['alamat']?></textarea></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3"><label for="fid-name">Pilih Kota<label></div>
                        <div class="col-sm-9">
                            <select name="id_wilayah" required>
                                <?php
                        
                                $wilayah = mysqli_query($koneksi, "SELECT * FROM tbl_wilayah");
                                while($data_wilayah=mysqli_fetch_array($wilayah)){
                                ?>
                                    <option value="<?=$data_wilayah['id_wilayah']?>"><?=$data_wilayah['nama_wilayah']?></option>;
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
            </div>
               </form>

        </div>
    </div>
</div>

<?php

if(isset($_POST['cekout'])) {

    $cek_produk = mysqli_query($koneksi, "SELECT * FROM tbl_keranjang JOIN tbl_produk ON tbl_keranjang.kd_produk=tbl_produk.kd_produk WHERE id_pelanggan='$_SESSION[id_pelanggan]' AND status_pemesanan='1'");
    $data_cek_produk = mysqli_num_rows($cek_produk);

    if($data_cek_produk==1) {

        $cek_alamat = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan WHERE id_pelanggan='$_SESSION[id_pelanggan]' AND id_wilayah=1");
        $data_cek_alamat = mysqli_num_rows($cek_alamat);

        if($data_cek_alamat==1){

            /*----------- INPUT TABEL ORDER ------------*/
            $query = mysqli_query($koneksi, "select max(id_order) AS kodeTerbesar FROM tbl_transaksi");
            $data = mysqli_fetch_array($query);
            $id_order_2 = $data['kodeTerbesar'];
                                            
            $urutan = (int) substr($id_order_2, 2, 8);
                                            
            $urutan++;

            $huruf = "TR";
            $id_order_last = $huruf.sprintf("%06s", $urutan);

            $tgl_order = date('Y-m-d');
            $jenis_byr = $_POST['jenis_byr'];
            $jml_byr = $_POST['total_byr'];
            $ongkir = $_POST['jml_ongkir'];

            $add_order = mysqli_query($koneksi, "INSERT INTO tbl_transaksi (id_order, id_pelanggan, tgl_pemesanan, jenis_byr, jml_byr, ongkir, tgl_byr, bukti_byr, status) VALUES ('$id_order_last','$_SESSION[id_pelanggan]','$tgl_order','$jenis_byr','$jml_byr','$ongkir','0000-00-00','-','1')");
            $ubah_poin = mysqli_query($koneksi, "UPDATE tbl_pelanggan SET nominal_poin=0 WHERE id_pelanggan='$_SESSION[id_pelanggan]'");
            /*----------------- BERES -------------------*/

            if($add_order) {

                /*-------------- INPUT DATA KE DETAIL ORDER --------------*/
                $add_detail_order = mysqli_query($koneksi, "SELECT * FROM tbl_keranjang WHERE id_pelanggan='$_SESSION[id_pelanggan]'");

                while($detail_order=mysqli_fetch_array($add_detail_order)){

                    $kd_produk = $detail_order['kd_produk'];
                    $pcs = $detail_order['jml_pcs'];
                    $jml_byr = $detail_order['jml_byr'];

                    $add = mysqli_query($koneksi, "INSERT into tbl_detail_order(id_detail_order,id_order,kd_produk,pcs,jml_byr) VALUES (null, '$id_order_last','$kd_produk','$pcs','$jml_byr')");
                    $hapus_keranjang = mysqli_query($koneksi, "DELETE FROM tbl_keranjang WHERE id_pelanggan='$_SESSION[id_pelanggan]'");
                }
                /*---------------------- BERES --------------------------*/

                if($add) {

                    /*--------------- INPUT DATA KE PENGIRIMAN ---------------*/
                    $query1 = mysqli_query($koneksi, "select max(id_pengiriman) AS kodeTerbesar FROM tbl_pengiriman");
                    $data1 = mysqli_fetch_array($query1);
                    $id_pengiriman_2 = $data1['kodeTerbesar'];
                                                    
                    $urutan1 = (int) substr($id_pengiriman_2, 2, 8);
                                                    
                    $urutan1++;
                                                    
                    $huruf1 = "TR";
                    $id_pengiriman_last = $huruf1.sprintf("%06s", $urutan1);

                    $kurir = $_POST['kurir'];
                    $alamat = $_POST['alamat_pengiriman'];
                    //$tgl_pengiriman = date('Y-m-d');

                    $add_pengiriman = mysqli_query($koneksi, "INSERT INTO tbl_pengiriman (id_pengiriman, id_order, tgl_pengiriman, kurir, alamat_pengiriman, status_pengiriman) VALUES ('$id_pengiriman_last','$id_order_last','0000-00-00','$kurir','$alamat',1)");

                    if($add_pengiriman)
                    {
                        ?>
                        <script>
                            window.location.href="index.php?page=pesanan_saya";
                        </script>
                    <?php
                    } else {
                    ?>
                        <script>
                            //alert('Gagal menyimpan');
                            //window.location.href="index.php?page=pesanan_saya";
                        </script>
                    <?php
                    }
                } else {
                    ?>
                        <script>
                            alert('Gagal menyimpan Detail Order');
                            window.location.href="index.php?page=pesanan_saya";
                        </script>
                    <?php
                }
            } else {
            
                ?>
                        <script>
                            alert('Gagal menyimpan order');
                            window.location.href="index.php?page=pesanan_saya";
                        </script>
                    <?php
            }

        } else {
    ?>
            <script>
                alert('Produk Air Minum Isi Ulang hanya bisa dipesan dengan cakupan alamat Desa Bojong');
            </script>
    <?php
        }
    
    } else {
                    /*----------- INPUT TABEL ORDER ------------*/
                    $query = mysqli_query($koneksi, "select max(id_order) AS kodeTerbesar FROM tbl_transaksi");
                    $data = mysqli_fetch_array($query);
                    $id_order_2 = $data['kodeTerbesar'];
                                                    
                    $urutan = (int) substr($id_order_2, 2, 8);
                                                    
                    $urutan++;
        
                    $huruf = "TR";
                    $id_order_last = $huruf.sprintf("%06s", $urutan);
        
                    $tgl_order = date('Y-m-d');
                    $jenis_byr = $_POST['jenis_byr'];
                    $jml_byr = $_POST['total_byr'];
                    $ongkir = $_POST['jml_ongkir'];

                    $add_order = mysqli_query($koneksi, "INSERT INTO tbl_transaksi (id_order, id_pelanggan, tgl_pemesanan, jenis_byr, jml_byr, ongkir, tgl_byr, bukti_byr, status) VALUES ('$id_order_last','$_SESSION[id_pelanggan]','$tgl_order','$jenis_byr','$jml_byr','$ongkir','0000-00-00','-','1')");
                    $ubah_poin = mysqli_query($koneksi, "UPDATE tbl_pelanggan SET nominal_poin=0 WHERE id_pelanggan='$_SESSION[id_pelanggan]'");
            
                    /*----------------- BERES -------------------*/
        
                    if($add_order) {
        
                        /*-------------- INPUT DATA KE DETAIL ORDER --------------*/
                        $add_detail_order = mysqli_query($koneksi, "SELECT * FROM tbl_keranjang WHERE id_pelanggan='$_SESSION[id_pelanggan]'");
        
                        while($detail_order=mysqli_fetch_array($add_detail_order)){
        
                            $kd_produk = $detail_order['kd_produk'];
                            $pcs = $detail_order['jml_pcs'];
                            $jml_byr = $detail_order['jml_byr'];

                            //ambil data stok
                            $stok = mysqli_query($koneksi, "SELECT * FROM tbl_produk WHERE kd_produk='$kd_produk'");
                            $data_stok = mysqli_fetch_array($stok);
                            $stok_akhir = $data_stok['stok']-$pcs;
                            $ubah_stok = mysqli_query($koneksi, "UPDATE tbl_produk SET stok='$stok_akhir' WHERE kd_produk='$kd_produk'");
                            //selesai

                            $add = mysqli_query($koneksi, "INSERT into tbl_detail_order(id_detail_order,id_order,kd_produk,pcs,jml_byr) VALUES (null, '$id_order_last','$kd_produk','$pcs','$jml_byr')");
                            $hapus_keranjang = mysqli_query($koneksi, "DELETE FROM tbl_keranjang WHERE id_pelanggan='$_SESSION[id_pelanggan]'");
                        }
                        /*---------------------- BERES --------------------------*/
        
                        if($add) {
        
                            /*--------------- INPUT DATA KE PENGIRIMAN ---------------*/
                            $query1 = mysqli_query($koneksi, "select max(id_pengiriman) AS kodeTerbesar FROM tbl_pengiriman");
                            $data1 = mysqli_fetch_array($query1);
                            $id_pengiriman_2 = $data1['kodeTerbesar'];
                                                            
                            $urutan1 = (int) substr($id_pengiriman_2, 2, 8);
                                                            
                            $urutan1++;
                                                            
                            $huruf1 = "TR";
                            $id_pengiriman_last = $huruf1.sprintf("%06s", $urutan1);
        
                            $kurir = $_POST['kurir'];
                            $alamat = $_POST['alamat_pengiriman'];
                            //$tgl_pengiriman = date('Y-m-d');
        
                            $add_pengiriman = mysqli_query($koneksi, "INSERT INTO tbl_pengiriman (id_pengiriman, id_order, tgl_pengiriman, kurir, alamat_pengiriman, status_pengiriman) VALUES ('$id_pengiriman_last','$id_order_last','0000-00-00','$kurir','$alamat',1)");
        
                            if($add_pengiriman)
                            {
                                ?>
                                <script>
                                    window.location.href="index.php?page=pesanan_saya";
                                </script>
                            <?php
                            } else {
                            ?>
                                <script>
                                    //alert('Gagal menyimpan');
                                    //window.location.href="index.php?page=pesanan_saya";
                                </script>
                            <?php
                            }
                        } else {
                            ?>
                                <script>
                                    alert('Gagal menyimpan Detail Order');
                                    window.location.href="index.php?page=pesanan_saya";
                                </script>
                            <?php
                        }
                    } else {
                    
                        ?>
                                <script>
                                    alert('Gagal menyimpan order');
                                    window.location.href="index.php?page=pesanan_saya";
                                </script>
                            <?php
                    }
            }
}
?>
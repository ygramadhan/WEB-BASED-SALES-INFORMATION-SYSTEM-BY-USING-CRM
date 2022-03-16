<!--Hero Section-->
<div class="hero-section hero-background">
    <h1 class="page-title">Keranjang Saya</h1>
</div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index-2.html" class="permal-link">Beranda</a></li>
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
                                        <th class="product-price">Stok</th>
                                        <th class="product-quantity">Kuantiti</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $id = $_GET['id'];

                                    $keranjang = mysqli_query($koneksi, "SELECT * FROM tbl_keranjang JOIN tbl_produk ON tbl_keranjang.kd_produk = tbl_produk.kd_produk WHERE kd_keranjang='$id'");

                                    $data_keranjang = mysqli_fetch_array($keranjang);
                                    
                                        //$total = $total+$data_keranjang[''];
                                        if($data_keranjang['diskon']==0)
                                        {
                                            $harga = $data_keranjang['harga'];
                                            $harga_show = rupiah($data_keranjang['harga']);
                                            $harga_coret = "";
                                            $diskon ="";
                                        } else {
                                            $hit_diskon = $data_keranjang['diskon']*$data_keranjang['harga']/100;
                                            $harga_coret = rupiah($data_keranjang['harga']);
                                            $harga = $data_keranjang['harga']-$hit_diskon;
                                            $harga_show = rupiah($data_keranjang['harga']-$hit_diskon);
                                            $diskon = "Diskon ".$data_keranjang['diskon']." %";
                                        }
                                    ?>
                                    <input type="hidden" name="kd_produk" value="<?=$data_keranjang['kd_produk']?>">
                                    <input type="hidden" name="kd_keranjang" value="<?=$data_keranjang['kd_keranjang']?>">
                                    <input type="hidden" name="harga" value="<?=$harga?>">
                                    <tr class="cart_item">
                                        <td class="product-thumbnail" data-title="Product Name">
                                            <a class="prd-thumb" href="index.php?page=detail_produk&id=<?=$data_keranjang['kd_produk']?>">
                                                <figure><img width="113" height="113" src="../admin/produk/pict/<?=$data_keranjang['gambar']?>" alt="shipping cart"></figure>
                                            </a>
                                            <a class="prd-name" href="index.php?page=detail_produk&id=<?=$data_keranjang['kd_produk']?>" onclick="fungsi_total()"><?=$data_keranjang['nama_produk']?></a>
                                            <div class="action">
                                                <a href="index.php?page=hapus_keranjang&id=<?=$data_keranjang['kd_keranjang']?>" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><?=$harga_show?><input type="hidden" id="harga" value="<?=$harga?>"></ins>
                                                <del><span class="price-amount"><?=$harga_coret?></span></del>
                                            </div>
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><?=$data_keranjang['stok']?></ins>
                                            </div>
                                        </td>
                                        <td class="product-quantity" data-title="Quantity">
                                            <div class="quantity-box type1">
                                                <div class="qty-input">
                                                    <input type="number" id="qty" name="qty1" value="<?=$data_keranjang['jml_pcs']?>" min="1" max="100" onchange="fungsi_total()">
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Total">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount" id="subtotal"><?=$harga_show?></span></ins>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="cart_item wrap-buttons">
                                        <td class="wrap-btn-control" colspan="5">
                                            <a class="btn back-to-shop" href="index.php?page=home">Kembali ke Toko</a>
                                            <button type="submit" class="btn btn-clear" name="update">Update Keranjang</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
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

<?php

if(isset($_POST['update'])) {
    
    $harga = $_POST['harga'];
    $kd_produk = $_POST['kd_produk'];
    $kd_keranjang = $_POST['kd_keranjang'];
    $qty = $_POST['qty1'];

    //cek stok
    $cek_stok = mysqli_query($koneksi, "SELECT stok FROM tbl_produk WHERE kd_produk='$kd_produk'");
    $stok=mysqli_fetch_array($cek_stok);

    if($qty<=$stok['stok'])
    {

        $jml_byr = $harga*$qty;

        $update = mysqli_query($koneksi, "UPDATE tbl_keranjang SET jml_pcs='$qty', jml_byr='$jml_byr' WHERE kd_keranjang='$kd_keranjang'");

        if($update){
            ?>
            <script>
                window.location.href="index.php?page=keranjang";
            </script>
        <?php 
        } else {
        ?>
            <script>
            window.location.href="index.php?page=keranjang";
            </script>
        <?php
        }
    } else {

        ?>
        <script type="text/javascript">
            
            alert("Jumlah kuantiti melebihi batas pembelian");
            
            /*window.onload = function //() {
  
            var qty = parseInt(document.getElementById('qty').value);
            var harga = parseInt(document.getElementById('harga').value);

            var jumlah_harga = qty * harga;

            document.getElementById("subtotal").innerHTML = "Rp." + jumlah_harga;
        
            document.getElementById("qty").onchange = validatePassword;}

            function validatePassword(){
            document.getElementById("qty").setCustomValidity("Melebihi batas pembelian");
            }*/
        </script>
    <?php
    }
}
?>
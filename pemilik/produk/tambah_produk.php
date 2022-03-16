<div class="page-contain login-page">

<!-- Main content -->
<div id="main-content" class="main-content">
    <div class="container">

        <div class="row">

            <!--Go to Register form-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="register-in-container">
                    <div class="intro">
                        <h4 class="box-title"><center>Data Kategori</h4><br>
                        
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addKategori"><i class="fa fa-plus fa-sm text-white-60"></i> Tambah Kategori</a><br><br>
                        
                        <table class="striped">
                            <thead>
                                <tr>
                                    <td>No.</td>
                                    <td>Kategori</td>
                                    <td>Keterangan</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                            $batas = 5;
                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

                            $previous = $halaman - 1;
                            $next = $halaman + 1;

                            $jml_kategori = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
                            $jumlah_data = mysqli_num_rows($jml_kategori);
                            $total_halaman = ceil($jumlah_data / $batas);

                            $kategori = mysqli_query($koneksi, "SELECT * FROM tbl_kategori limit $halaman_awal, $batas");
                            $nomor = $halaman_awal+1;

                            $no=1;

                            while($data_kategori = mysqli_fetch_array($kategori)){
                            ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$data_kategori['nama_kategori']?></td>
                                <td><?=$data_kategori['keterangan']?></td>
                                <td>
                                <a href="index.php?page=edit_kategori&id=<?=$data_kategori['id_kategori']?>" class="btn btn-warning" ><i class="fa fa-pencil fa-sm text-white-60"></i></a>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>

                            </tbody>
                        </table>
                        <?php
                            //membuat kd produk otomatis
                            $query = mysqli_query($koneksi, "select max(kd_produk) AS kodeTerbesar FROM tbl_produk");
                            $data = mysqli_fetch_array($query);
                            $id_konsumen_last = $data['kodeTerbesar'];
                                                            
                            $urutan = (int) substr($id_konsumen_last, 3, 3);
                                                            
                            $urutan++;
                                                            
                            $huruf = "P";
                            $id_konsumen_last = $huruf.sprintf("%03s", $urutan);
                            //selesai
                        ?>

                        <br><h4 class="box-title"><center>Data Produk</h4>
                        <div class="signin-container">
                            <form action="" name="frm-login" method="post" enctype="multipart/form-data">
                                <p class="form-row">
                                    <label for="fid-name">Kode Produk : <span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="kd_produk" class="txt-input" value="<?=$id_konsumen_last?>" readonly>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Pilih Kategori : <span class="requite">*</span></label>
                                    <select name="id_kategori" required>
                                        <?php
                                        $kategori1 = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
                                        while($data_kategori1=mysqli_fetch_array($kategori1)){
                                            echo "<option value='".$data_kategori1['id_kategori']."'>".$data_kategori1['nama_kategori']."</option>";
                                        }
                                        ?>
                                    </select>
                                </p>
                                <br><br>
                                <p class="form-row">
                                    <label for="fid-name">Nama Produk : <span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="nama_produk" class="txt-input" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Berat (Dalam Gram): <span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="berat" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Harga : <span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="harga" class="txt-input" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Stok : <span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="stok" class="txt-input" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Diskon (Dalam %): <span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="diskon" class="txt-input" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Deskripsi : <span class="requite">*</span></label>
                                    <textarea cols="200" rows="5" id="fid-name" name="deskripsi" class="txt-input" required></textarea>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Gambar : <span class="requite">*</span></label>
                                    <input type="file" id="fid-name" name="gambar" class="txt-input" required>
                                </p>
                                <p class="form-row wrap-btn">
                                    <button class="btn btn-submit btn-bold" type="submit" name="simpan">Simpan</button>
                                </p>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

</div>

<!-- Modal Input Data -->
<div class="modal fade" id="addKategori" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSayaLabel">Tambah Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="index.php?page=add_kategori" method="post">
                    <div class="row">
                        <div class="col-sm-3"><label for="fid-name">Nama Kategori</label></div>
                        <div class="col-sm-9"><input type="text" class="form-control" id="nama" name="nama_kategori" required></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3"><label for="fid-name">Keterangan</label></div>
                        <div class="col-sm-9"><textarea cols="20" rows="3" class="form-control" id="nama" name="keterangan" ></textarea></div>
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

if(isset($_POST['simpan'])) {

    $kd_produk = $_POST['kd_produk'];
	$nama_produk = $_POST['nama_produk'];
	$id_kategori = $_POST['id_kategori'];
	$berat = $_POST['berat'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
	$diskon = $_POST['diskon'];
	$deskripsi = $_POST['deskripsi'];

    $namaFile = $_FILES['gambar']['name'];
    $namaSementara = $_FILES['gambar']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    $dirUpload = 'produk/pict';

    // pindahkan file
    $terupload = move_uploaded_file($namaSementara, "$dirUpload/$namaFile");

    if($terupload) {

	    $query_add = mysqli_query($koneksi, "INSERT into tbl_produk (kd_produk, id_kategori, nama_produk, deskripsi, berat, harga, stok, gambar, diskon, status) VALUES ('$kd_produk','$id_kategori','$nama_produk','$deskripsi','$berat','$harga','$stok','$namaFile','$diskon',0)");

        if($query_add){
            ?>
            <script>
                alert ('Produk berhasil ditambahkan');
                window.location.href = "index.php?page=produk&view=tabel";
            </script>
        <?php
        } else {
            var_dump($query_add);
        }
    } else {
       ?>

		<script>
            alert ('Produk gagal ditambahkan');
//            window.location.href = "index.php?page=add_produk";
		</script>	
	<?php	
	}
	
}
?>
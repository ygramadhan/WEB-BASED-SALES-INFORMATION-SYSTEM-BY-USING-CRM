<div class="page-contain login-page">

<!-- Main content -->
<div id="main-content" class="main-content">
    <div class="container">

        <div class="row">

            <!--Go to Register form-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="register-in-container">
                    <div class="intro">
                        <h4 class="box-title"><center>Pendaftaran</h4>
                        <div class="signin-container">
                            <form action="" name="frm-login" method="post">
                                <p class="form-row">
                                    <label for="fid-name">Nama Lengkap : <span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="nama_pelanggan" class="txt-input" required>
                                </p>
                                <div class="action-form">
                                    <label for="fid-name">Jenis Kelamin : <span class="requite">*</span></label><br>
                                    <input type="radio" id="fid-name" name="jk" value="L" required>   Laki-laki
                                    <input type="radio" id="fid-name" name="jk" value="P">   Perempuan
                                </div>
                                <p class="form-row">
                                    <br><label for="fid-name">Tanggal Lahir : <span class="requite">*</span></label>
                                    <input type="date" id="fid-name" name="tgl_lahir" class="txt-input" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Alamat : <span class="requite">*</span></label>
                                    <input type="text" name="jl" placeholder="Jl." class="form-input" required><br>
                                </p>
                                <p class="action-form">
                                    <input type="text" name="dusun" placeholder="Dusun/Blok" required>&nbsp;&nbsp;
                                    <input type="text" name="rt" placeholder="RT." onkeypress="return event.charCode >= 48 && event.charCode <=57" required>&nbsp;&nbsp;
                                    <input type="text" name="rw" placeholder="RW." onkeypress="return event.charCode >= 48 && event.charCode <=57" required>
                                    <input type="text" name="desa" placeholder="Desa" required>&nbsp;&nbsp;
                                    <input type="text" name="kec" placeholder="Kec." required>&nbsp;&nbsp;
                                </p>
                                <p class="action-form">
                                    <select name="id_wilayah" required>
                                        <?php
                                        $kec = mysqli_query($koneksi, "SELECT * FROM tbl_wilayah");
                                        $hit = mysqli_num_rows($kec);

                                        if($hit==0){
                                            echo "<option value=''>Belum Ada Data Wilayah</option>";
                                        } else {
                                            echo "<option value=''>-- Pilih Kota --</option>";
                                            while($data_kec = mysqli_fetch_array($kec)) {
                                                echo "<option value='".$data_kec['id_wilayah']."'>".$data_kec['nama_wilayah']."</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    *) Pilih Bojong - Kuningan jika anda berada di sekitar Desa Bojong, Kec.Cilimus - Kuningan dan dapatkan Free Ongkir
                                </p>
                                <br><br>
                                <p class="form-row">
                                    <label for="fid-name">Telepon : <span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="telp" class="txt-input" onkeypress="return event.charCode >= 48 && event.charCode <=57" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Email : <span class="requite">*</span></label>
                                    <input type="email" id="fid-name" name="email" class="txt-input" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Username : <span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="username" class="txt-input" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-pass">Password : <span class="requite">*</span></label>
                                    <input type="password" id="fid-pass" name="password" value="" class="txt-input" required>
                                </p>
                                <p class="form-row wrap-btn">
                                    <button class="btn btn-submit btn-bold" type="submit" name="daftar">DAFTAR</button>
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

<?php

if(isset($_POST['daftar'])) {
	
	//membuat id_konsumen otomatis
	$query = mysqli_query($koneksi, "select max(id_pelanggan) AS kodeTerbesar FROM tbl_pelanggan");
	$data = mysqli_fetch_array($query);
	$id_konsumen_last = $data['kodeTerbesar'];
									
	$urutan = (int) substr($id_konsumen_last, 5, 5);
									
	$urutan++;
									
	$huruf = "PLN";
	$id_konsumen_last = $huruf.sprintf("%05s", $urutan);
	//selesai

    //menggabungkan alamat
	$jl = $_POST['jl'];
    $dusun = $_POST['dusun'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $desa = $_POST['desa'];
    $kec = $_POST['kec'];
    $id_wilayah = $_POST['id_wilayah'];
 
    $alamat = $jl.", Dusun ".$dusun.", RT. ".$rt.", RW. ".$rw.", Desa ".$desa.", Kec. ".$kec;

    $nama_pelanggan = $_POST['nama_pelanggan'];
	$jk = $_POST['jk'];
	$tgl_lahir = $_POST['tgl_lahir'];
    $telp = $_POST['telp'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	
	$query_add = mysqli_query($koneksi, "INSERT into tbl_pelanggan (id_pelanggan, nama_pelanggan, jk, tgl_lahir, alamat, id_wilayah, telp, email, username, password, poin, nominal_poin, status_pelanggan) VALUES ('$id_konsumen_last','$nama_pelanggan','$jk','$tgl_lahir','$alamat','$id_wilayah','$telp','$email','$username','$password',0,0,0)");
	
	if($query_add){
		?>
		<script>
			alert ('Proses Pendaftaran berhasil ! Tunggu proses validasi akun selama 1 x 24 jam');
   		window.location.href = "index.php";
		</script>
	<?php
	} else {
   ?>
		<script>
			alert ('Proses Pendaftaran Gagal, Tunggu beberapa saat lagi !');
            window.location.href = "index.php?page=register";
		</script>	
	<?php	
	}
	
}
?>
   
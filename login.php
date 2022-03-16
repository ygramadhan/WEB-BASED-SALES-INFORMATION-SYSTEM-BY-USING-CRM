<?php
include "koneksi.php";
	if(isset($_SESSION['username'])) {
		if($_SESSION['level'] == "Admin"){
			header("location:admin/index.php");
		}else if($_SESSION['level'] == "Pemilik"){
			header("location:direktur/index.php");
		}else if($_SESSION['level'] == "Pelanggan"){
			header("location:pelanggan/index.php");
		}
		
	} elseif (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
		
		$login = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username='$username' AND password='$password'");
		$cek = mysqli_num_rows($login);
		
		if($cek>0) {
			$data = mysqli_fetch_assoc($login);
			
			if($data['level']=="Admin") {
				$_SESSION['id_user'] = $data['id_user'];
				$_SESSION['username'] = $username;
                $_SESSION['nama_user'] = $data['nama_user'];
				$_SESSION['level'] = "Admin";
				header("location:admin/index.php");
			} else if ($data['level']=="Pemilik") {
				$_SESSION['id_user'] = $data['id_user'];
				$_SESSION['username'] = $username;
                $_SESSION['nama_user'] = $data['nama_user'];
				$_SESSION['level'] = "Pemilik";
		        header("location:pemilik/index.php");
			} else {
		        header("location:pesan_gagal.php");
			}
		} else {
		
            $login2 = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan WHERE username='$username' AND password='$password' AND status_pelanggan=1");
            $cek2 = mysqli_num_rows($login2);		
			
				if($cek2>0) {
					$data = mysqli_fetch_assoc($login2);
				
					$_SESSION['id_pelanggan'] = $data['id_pelanggan'];
                    $_SESSION['nama_user'] = $data['nama_pelanggan'];
					$_SESSION['username'] = $username;
					$_SESSION['level'] = "Pelanggan";

					header("location:pelanggan/index.php");

				} else {
				?>
					<script>
						alert('Username dan Password yang anda masukan salah !');
						window.location.href="index.php";
					</script>
				<?php
				}
			}
    	}
?>
 
<div class="page-contain login-page">
        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">

                <div class="row">

                    <!--Form Sign In-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="signin-container">
                            <form action="" name="" method="post">
                                <p class="form-row">
                                    <label for="fid-name">Username : <span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="username" value="" class="txt-input" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-pass">Password : <span class="requite">*</span></label>
                                    <input type="password" id="fid-pass" name="password" value="" class="txt-input" required>
                                </p>
                                <p class="form-row wrap-btn">
                                    <button class="btn btn-submit btn-bold" type="submit" name="login">Masuk</button>
                                </p>
                            </form>
                        </div>
                    </div>

                    <!--Go to Register form-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="register-in-container">
                            <div class="intro">
                                <h4 class="box-title">Pelanggan Baru?</h4>
                                <p class="sub-title">Buat akun sekarang untuk mendapatkan keuntungan :</p>
                                <ul class="lis">
                                    <li>Produk Terbaru</li>
                                    <li>Bonus dan Reward tiap pembelanjaan</li>
                                    <li>Melihat Track Pesanan</li>
                                    <li>Isi keranjang</li>
                                </ul>
                                <a href="index.php?page=register" class="btn btn-bold">Buat Akun</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
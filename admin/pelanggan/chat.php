<div class="page-contain login-page">

<!-- Main content -->
<div id="main-content" class="main-content">
    <div class="container">

        <div class="row">

            <!--Go to Register form-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="register-in-container">
                    <div class="intro">
                        <h4 class="box-title"><center>Chat Pelanggan</h4><br>
                        <form action="" name="frm-login" method="post">
                        <?php

                        $id=$_GET['id'];

                        $ubah_status = mysqli_query($koneksi, "UPDATE tbl_chat SET status='1' WHERE id_pelanggan='$id' AND sender='Pelanggan'");

                        $chat = mysqli_query($koneksi,"SELECT * FROM tbl_chat JOIN tbl_pelanggan ON tbl_chat.id_pelanggan=tbl_pelanggan.id_pelanggan WHERE tbl_chat.id_pelanggan='$id' ORDER BY id_chat ASC");                        
                        while($data_chat = mysqli_fetch_array($chat)) {

                            if($data_chat['sender']=='Admin') {
                                echo $pesan ="<p align='right'><b>Admin</b> :</p><input class='txt-input' type='text' style='width: 700px; background:#ADD8E6; float:right;' value='".$data_chat['pesan']."'readonly><br><br>";
                            } else {
                                echo $pesan ="<p align='left'><b>".$data_chat['nama_pelanggan'].":</b></p><input type='text' style='width: 700px; background:#87CEEB; float:left;' value='".$data_chat['pesan']."'readonly><br><br>";
                            }

                        }
                        ?>
                        
                       <div class="signin-container">
                                <p class="form-row">
                                    <input type="hidden" name="id_pelanggan" value="<?=$id?>">
                                    <textarea cols="200" rows="3" maxlength="300" id="fid-name" name="pesan" class="txt-input" placeholder="Masukan Pesan .." required></textarea>
                                    * Pesan maksimal 300 karakter
                                </p>
                                <p class="form-row">
                                    <button type="submit" id="fid-name" name="kirim" class="btn btn-primary">Kirim</button>
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

if(isset($_POST['kirim'])) {

    $id_pelanggan = $_POST['id_pelanggan'];
    $pesan = $_POST['pesan'];
    $waktu = date('Y-m-d H:i:s');

    $ubah = mysqli_query($koneksi, "INSERT INTO tbl_chat (id_chat, id_pelanggan, pesan, waktu, sender, status) VALUES (null, '$id_pelanggan', '$pesan', '$waktu','Admin','N')");

    if($ubah){
            ?>
            <script>
                alert ('Pesan berhasil dikirim');
                window.location.href = "index.php?page=pelanggan";
            </script>
        <?php
    } else {
       ?>
		<script>
            alert ('Pesan gagal dikirim');
            window.location.href = "index.php?page=pelanggan";
		</script>	
	<?php	
	}	
}
?>
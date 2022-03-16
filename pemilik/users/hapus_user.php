<?php

	$id = $_GET['id'];
	
	$hapus = mysqli_query($koneksi, "DELETE FROM tbl_user WHERE id_user='$id' ");
	
	if($hapus){
	//	var_dump($query_add);
        ?>
		<script>
			alert ('Data user berhasil di hapus');
       		window.location.href = "index.php?page=users";
		</script>
	<?php
	} else {
   ?>
		<script>
			alert ('User gagal dihapus');
            window.location.href = "index.php?page=users";
		</script>	
	<?php	
	}
	
?>
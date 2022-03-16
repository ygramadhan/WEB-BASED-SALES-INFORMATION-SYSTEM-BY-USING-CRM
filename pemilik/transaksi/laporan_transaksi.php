<?php
ob_start();

require('../../fpdf16/fpdf.php');

$tgl_awal = tanggal_indo($_GET['tgl_awal']);
$tgl_akhir = tanggal_indo($_GET['tgl_akhir']);


//membuat objek baru bernama pdf dari class FPDF
//dan melakukan setting kertas l : landscape, A5 : ukuran kertas
$pdf = new FPDF('l','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// menyetel font yang digunakan, font yang digunakan adalah arial, bold dengan ukuran 16
$pdf->SetFont('Arial','B',16);
// judul
$pdf->Cell(270,7,'LAPORAN DATA TRANSAKSI',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(270,7,'DEPOT BAROKAH',0,1,'C');
$pdf->Cell(270,7,'PERIODE '.$tgl_awal.' s/d '.$tgl_akhir,0,1,'C');
 
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'No',1,0);
$pdf->Cell(20,6,'ID Order',1,0);
$pdf->Cell(35,6,'Nama Konsumen ',1,0);
$pdf->Cell(50,6,'Nama Produk',1,0);
$pdf->Cell(30,6,'Tgl Order',1,0);
$pdf->Cell(30,6,'Metode Bayar',1,0);
$pdf->Cell(25,6,'Total Bayar',1,0);
$pdf->Cell(40,6,'Alamat Pengiriman',1,0);
$pdf->Cell(40,6,'Status',1,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(10,7,'',0,1);
 
function tanggal_indo($tanggal)
{
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}

//koneksi ke hasilbase
$mysqli = mysqli_connect("localhost","root","","barokah_depot");
$no = 1;

$tgl_awal = @$_GET['tgl_awal'];
$tgl_akhir = @$_GET['tgl_akhir'];

if(empty($tgl_awal) or empty ($tgl_akhir)) {
    $order = mysqli_query($mysqli, "SELECT * FROM tbl_transaksi JOIN tbl_pelanggan ON tbl_transaksi.id_pelanggan = tbl_pelanggan.id_pelanggan");
} else {
    $order = mysqli_query($mysqli, "SELECT * FROM tbl_transaksi JOIN tbl_pelanggan ON tbl_transaksi.id_pelanggan = tbl_pelanggan.id_pelanggan WHERE (tgl_pemesanan BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')");
}

$total=0;
while($data_order=mysqli_fetch_array($order)){

    $produk = mysqli_query($mysqli,"SELECT * FROM tbl_detail_order JOIN tbl_produk ON tbl_detail_order.kd_produk=tbl_produk.kd_produk WHERE id_order='$data_order[id_order]'");
    $data_produk = mysqli_fetch_array($produk);
    $total=$total+$data_order['jml_byr'];
    
        if($data_order['status']==1) {
            $status = "Menunggu Pembayaran";            
        } elseif($data_order['status']==2) {
            $status = "Menunggu Konfirmasi";
        } elseif($data_order['status']==3) {
            $status = "Sedang Dikemas";
        } elseif($data_order['status']==4) {
            $status = "Sedang dikirim";
        } else {
            $status = "Sudah dikirim";
        }

        if($data_order['jenis_byr']=='TF') {
            $jenis = "Transfer";
        } else {
            $jenis = "E-Wallet";
        }
    
        $cellWidth=40; //lebar sel
        $cellHeight=7; //tinggi sel satu baris normal
        
        //periksa apakah teksnya melibihi kolom?
        if($pdf->GetStringWidth($data_order['alamat']) < $cellWidth){
            //jika tidak, maka tidak melakukan apa-apa
            $line=1;
        }else{
            //jika ya, maka hitung ketinggian yang dibutuhkan untuk sel akan dirapikan
            //dengan memisahkan teks agar sesuai dengan lebar sel
            //lalu hitung berapa banyak baris yang dibutuhkan agar teks pas dengan sel
            
            $textLength=strlen($hasil['alamat']);	//total panjang teks
            $errMargin=2;		//margin kesalahan lebar sel, untuk jaga-jaga
            $startChar=0;		//posisi awal karakter untuk setiap baris
            $maxChar=0;			//karakter maksimum dalam satu baris, yang akan ditambahkan nanti
            $textArray=array();	//untuk menampung data untuk setiap baris
            $tmpString="";		//untuk menampung teks untuk setiap baris (sementara)
            
            while($startChar < $textLength){ //perulangan sampai akhir teks
                //perulangan sampai karakter maksimum tercapai
                while( 
                $pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
                ($startChar+$maxChar) < $textLength ) {
                    $maxChar++;
                    $tmpString=substr($hasil['alamat'],$startChar,$maxChar);
                }
                //pindahkan ke baris berikutnya
                $startChar=$startChar+$maxChar;
                //kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
                array_push($textArray,$tmpString);
                //reset variabel penampung
                $maxChar=0;
                $tmpString='';
                
            }
            //dapatkan jumlah baris
            $line=count($textArray);
        }
        
        //tulis selnya
        $pdf->SetFillColor(255,255,255);
        $pdf->Cell(10,($line * $cellHeight),$no++,1,0,'C',true); //sesuaikan ketinggian dengan jumlah garis
        $pdf->Cell(20,($line * $cellHeight),$data_order['id_order'],1,0); //sesuaikan ketinggian dengan jumlah garis
        $pdf->Cell(35,($line * $cellHeight),$data_order['nama_pelanggan'],1,0);
        $pdf->Cell(50,($line * $cellHeight),$data_produk['nama_produk'],1,0);
        $pdf->Cell(30,($line * $cellHeight),tanggal_indo($data_order['tgl_pemesanan']),1,0);
        $pdf->Cell(30,($line * $cellHeight),$jenis,1,0);
        $pdf->Cell(25,($line * $cellHeight),rupiah($data_order['jml_byr']),1,0);
        $xPos=$pdf->GetX();
        $yPos=$pdf->GetY();
        $pdf->MultiCell($cellWidth,$cellHeight,$data_order['alamat'],1);
        $pdf->SetXY($xPos + $cellWidth , $yPos);
        $pdf->Cell(40,($line * $cellHeight),$status,1,1);
}
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',12);

$pdf->Cell(175,10,'Total Pemasukan',1,0,'L');
$pdf->Cell(105,10,rupiah($total),1,1);

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(263,12,'....., ..........................., ...........',0,1,'R');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(263,7,'Pemilik Depot Barokah',0,1,'R');
$pdf->Cell(10,30,'',0,1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(263,7,'TTD',0,1,'R');

$pdf->Output();
?>
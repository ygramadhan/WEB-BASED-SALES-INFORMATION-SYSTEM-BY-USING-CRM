<?php
 
class HitCounter {
 
    private $expire; //menentukan umur cookie
    private $file = 'visitor.txt';
 
    public function __construct() {
        if (!file_exists($this->file)) {
            //kondisi jika file visitor.txt belum ada, buat baru dengan nilai 0
            $handle = fopen($this->file, 'w');
            $data = 0;
            fwrite($handle, $data);
        }
        $this->expire = 30 * 86400; //umur cookie 30 hari
    }
 
    public function Hitung() {
        if (!isset($_COOKIE['counter'])) {
            //cookie kosong dan tambahkan jumlah pengunjung
            $handle = fopen($this->file, 'r');
            $data = intval(fread($handle, filesize($this->file))); //mengambil nilai dari visitor.txt
            $nilaibaru = $data + 1; //tambahkan nilai +1
            //simpan nilai baru
            $handle = fopen($this->file, 'w');
            fwrite($handle, $nilaibaru);
            setcookie('counter', time(), time() + $this->expire); //tambahkan cookie dengan nilai tanggal sekarang
        }
    }
 
    public function tampil() {
        //mengambil nilai dari visitor.txt
        $handle = fopen($this->file, 'r');
        $data = intval(fread($handle, filesize($this->file)));
        return $data;
    }
 
    public function waktu() {
        $history = null;
        //menampilkan kapan user berkunjung
        if (!empty($_COOKIE['counter'])) {
            $get = $_COOKIE['counter'];
            $history = date("d F Y", $get);
        }
        return $history;
    }
 
}
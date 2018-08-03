<?php
$tanggal		=date("Y-m-d");
$nama			=$_POST['nama'];
$email			=$_POST['email'];
$notelp			=$_POST['notelp'];
$buku_pilih		= '';
$qty 			= 1;

$dataValid = "YA";
if (strlen(trim($nama))==0){
	echo" nama harus diisi..<br/>";
	$dataValid="TIDAK";
	}
if (strlen(trim($notelp))==0){
	echo" notelp harus diisi..<br/>";
	$dataValid="TIDAK";
	}
if (isset($_COOKIE['keranjang'])){
	$buku_pilih=$_COOKIE['keranjang'];
	}else{
	echo" keranjang pinjam kosong <br/>";
	$dataValid="TIDAK";
	}
if ($dataValid == "TIDAK"){
	echo" masih ada kesalahan, silahkan perbaiki!<br/>";
	echo"<input type='button' value='kembali'
	onClick='self.history.back()'>";
	exit;
	}
	
	include "koneksi.php"; 
	
	$simpan = true;
	$mulai_transaksi = mysqli_query($kon, 'start_transaction');
	
	$sql = "insert into hpinjam (tanggal, nama, email, notelp)
	values ('$tanggal', '$nama', '$email', '$notelp')";
	$hasil = mysqli_query($kon, $sql);
	if(!$hasil) {
		echo "data customer gagal simpan <br/>";
		$simpan = false;
	}
	
	$idhpinjam = mysqli_insert_id ($kon);
	if($idhpinjam == 0) {
		echo "data customer tidak ada <br/>";
		$simpan = false;
	}
	
	$buku_array = explode(",",$buku_pilih);
	$jumlah = count ($buku_array);
	if($jumlah <= 1){
		echo "tidak ada buku yang dipilih <br/>";
		$simpan = false;
	}else{
		foreach($buku_array as $idbuku){
			if($idbuku == 0){
				continue;
		}
		$sql = "select * from buku where idbuku = $idbuku";
		$hasil = mysqli_query($kon,$sql);
		if(!$hasil) {
			echo "buku tidak ada <br/>";
			$simpan = false;
			break;
		}else{
			$row = mysqli_fetch_assoc($hasil);
			$stok = $row['stok'] - 1;
			if($stok < 0 ){
				echo "stok buku ".$row['nama']."kosong <br/>";
				$simpan = false;
				break;
			}
			
		}
		$sql = "insert into dpinjam (idhpinjam, idbuku, qty)
		values ('$idhpinjam', '$idbuku','$qty')";
		$hasil = mysqli_query($kon,$sql);
		if(!$hasil){
			echo "detail pinjam gagal simpan <br/>";
			$simpan = false;
			break;
		}
		$sql = "update buku set stok = $stok
		where idbuku = $idbuku";
		$hasil = mysqli_query($kon,$sql);
		if(!$hasil){
			echo "update stok buku gagal <br/>";
			$simpan = false;
			break;
		}
	}
}

if($simpan){
	$komit = mysqli_commit($kon);
}else{
	$rollback = mysqli_rollback($kon);
	echo "peminjaman gagal <br/>
	<input type = 'button' value ='kembali'
	onClick='self.history.back()'>";
	exit;
}
	header("Location : bukti_pinjam.php?idhpinjam=$idhpinjam");
	setcookie('keranjang' , $buku_pilih, time()-3600);
?>
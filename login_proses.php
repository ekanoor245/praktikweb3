<?php
	session_start();
	$pengguna	= $_POST['pengguna'];
	$kata_kunci = md5($_POST['kata_kunci']);
	
	$dataValid = "YA";
if (strlen(trim($pengguna))==0) {
	echo "user Harus Diisi! <br/>";
	$dataValid = "TIDAK";
}
if (strlen(trim($kata_kunci))==0) {
	echo "kata_kunci Harus Diisi! <br/>";
	$dataValid = "TIDAK";
}
if ($dataValid == "TIDAK") {
	echo "Masih Ada Kesalahan, silahkan perbaiki! <br/>";
	echo "<input type='button' value='Kembali'
			onClick='self.history.back()'> ";
	exit;
}

include "koneksi.php";
$sql = "select * from pengguna where
	user='".$pengguna."' and password='".$kata_kunci."' limit 1";
$hasil = mysqli_query($kon,$sql) or die ('gagal akses!<br/>');	
$jumlah = mysqli_num_rows($hasil);
if($jumlah > 0){
	$row = mysqli_fetch_assoc($hasil);
	$_SESSION["user"]			= $row["user"];
	$_SESSION["nama_lengkap"]	= $row["nama"];
	$_SESSION["akses"]			= $row["akses"];
	header("location : halaman_awal.php");
	}else{
	echo "user atau password salah!<br/>";
	echo "<input type='button' value='kembali'
	onClick='self.history.back()'>";
	}
?>
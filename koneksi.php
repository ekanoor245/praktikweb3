<?php
error_reporting(E_ALL ^ E_DEPRECATED);
	$host   = "localhost";
	$user   = "root";
	$pass   = "";
	$dbName = "sewa_buku";
	
	$kon = mysqli_connect ($host, $user, $pass);
	if (!$kon)
		die("Gagal Koneksi...");
	
	$hasil = mysqli_select_db($kon, $dbName);
	if (!$hasil) {
		$hasil = mysqli_query($kon, "CREATE DATABASE $dbName");
		if (!$hasil)
			die("Gagal Buat Database");
		else
			$hasil = mysqli_select_db($kon, $dbName);
			if (!$hasil) die ("Gagal Konek Database");
}

$sqlTabelBuku = "create table if not exists buku (
					idbuku int auto_increment not null primary key,
					kode varchar(10) not null,
					judul varchar(40) not null,
					pengarang varchar(40) not null,
					penerbit varchar(40) not null,
					stok int(11) not null,
					foto varchar(70) not null default '',
					KEY(idbuku) )";
					
mysqli_query ($kon, $sqlTabelBuku) or die ("Gagal Buat Tabel Buku: ".mysqli_error($kon));

$sqltabelhpinjam = "create table if not exists hpinjam (
				idhpinjam int auto_increment not null primary key,
				tanggal date not null,
				nama varchar(40) not null,
				email varchar(50)not null default '',
				notelp varchar(20)not null default ''
				)";
				
mysqli_query ($kon, $sqltabelhpinjam) or die ("Gagal Buat Tabel Buku Pinjam");

$sqltabeldpinjam = "create table if not exists dpinjam (
				iddpinjam int auto_increment not null primary key,
				idhpinjam int not null,
				idbuku int not null,
				qty int not null
				)";
				
mysqli_query ($kon, $sqltabeldpinjam) or die ("Gagal Buat Tabel Detail Pinjam");

$sqlTabelUser = "create table if not exists pengguna (
				idpengguna int auto_increment not null primary key,
				user varchar(25) not null,
				password varchar(50) not null,
				nama varchar(50) not null,
				akses varchar(10) not null
				)";
				
mysqli_query ($kon, $sqlTabelUser) or die ("Gagal Buat Tabel pengguna");

$sql = "select * from pengguna";
$hasil = mysqli_query($kon,$sql);
$jumlah = mysqli_num_rows($hasil);
if($jumlah == 0 ){
	$sql = "insert into pengguna (user, password, nama, akses) 
	values ('admin',md5('admin'), 'administrator', 'buku'),
			('cust', md5('cust'), 'pelanggan', 'pinjam')";
	mysqli_query($kon,$sql);
	}
	echo "tabel siap <hr/>";
?>
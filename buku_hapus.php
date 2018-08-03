<?php
	$idbuku=$_GET['idbuku'];
	include "koneksi.php";
	$sql="select * from buku where idbuku='$idbuku'";
	$hasil=mysqli_query($kon,$sql);
	if (!$hasil) die ('Gagal query. . .');
	
	$data=mysqli_fetch_array($hasil);
	$kode=$data["kode"];
	$judul=$data["judul"];
	$pengarang=$data["pengarang"];
	$penerbit=$data["penerbit"];
	$stok=$data["stok"];
	$foto=$data["foto"];
	
	if (isset($_GET['hapus'])){
		$sql="delete from buku where idbuku='$idbuku'";
		$hasil=mysqli_query($kon,$sql);
		if(!$hasil){
			echo "Gagal Hapus Buku: $nama . .<br/>";
			echo "<a href='buku_tampil.php'>Kembali Ke daftar Buku</a>";
		}else  {
			$gbr="image/$foto";
			if(file_exists($gbr)) unlink($gbr);
			$gbr="thumb/t_$foto";
			if(file_exists($gbr)) unlink ($gbr);
			header('location:buku_tampil.php');
		}
	}
?>
<table border ="1" cellspacing="0" cellpadding="5">
<?php
	echo"<tr><td colspan='2' align='center'><h2>Konfirmasi Hapus Buku</h2></td></tr>";
	echo "<tr>";
		echo "<td colspan ='2' align='center'>
			<a href='pict/{$data['foto']}'/>
			<img src='thumb/t_{$data['foto']}' width='200' height='280'/>
			</a></td>";
	echo "</tr>";
	echo "<tr>";
			echo "<td> Kode</td>";
			echo "<td>$kode</td>";
	echo "</tr>";
	echo "<tr>";
			echo "<td>Judul Buku</td>";
			echo "<td>$judul</td>";
	echo "</tr>";
	echo "<tr>";
			echo "<td>Pengarang</td>";
			echo "<td>$pengarang</td>";
	echo "</tr>";
	echo "<tr>";
			echo "<td>Penerbit</td>";
			echo "<td>$penerbit</td>";
	echo "</tr>";
	echo "<tr>";
			echo "<td>Jumlah Stok</td>";
			echo "<td>$stok</td>";
	echo "</tr>";
	echo"<tr>";
	echo "<td colspan='2' align='center'>Apakah Data Buku Ini Akan Dihapus?<br/>";
	echo "<a href='buku_hapus.php?idbuku=$idbuku&hapus=1'>YA</a>";
				echo "&nbsp;&nbsp&nbsp;&nbsp;";
				echo "<a href='buku_tampil.php'>TIDAK</a><br/><br/></td>";
	echo"</tr>";
?>
</table>
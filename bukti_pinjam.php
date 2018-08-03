<style type ="text/css">
	@media print {
		#tombol{
			display:none;
		}
	}
</style>
<div id="tombol">
	<input type="button" value="PINJAM LAGI"
	onClick="window.location.assign('buku_tersedia.php')">
	<input type="button" value="PRINT"
	onClick="window.print()">
</div>
	<?php
	$idhpinjam = $_GET["idhpinjam"];
	include "koneksi.php";
	$sqlhpinjam = "select * from hpinjam where idhpinjam = $idhpinjam";
	$hasilhpinjam = mysqli_query($kon,$sqlhpinjam);
	$rowhpinjam = mysqli_fetch_assoc($hasilhpinjam);
	
	echo "<pre>";
	echo "<h2>BUKTI PEMINJAMAN</h2>";
	echo "NO :".date("Y-m-d").$rowhpinjam['idhpinjam']."<br/>";
	echo "TANGGAL :".$rowhpinjam['tanggal']."<br/>";
	echo "NAMA :".$rowhpinjam['nama']."<br/>";
	$sqldpinjam = "select buku.judul , buku.pengarang , dpinjam.qty 
	from dpinjam inner join buku on dpinjam.idbuku = buku.idbuku
	where dpinjam.idhpinjam = $idhpinjam";
	$hasildpinjam = mysqli_query($kon,$sqldpinjam);
	echo "<table border='1' cellpadding='10' cellspacing='0'>";
	echo "<tr>";
	echo "<th>Judul Buku</th>";
	echo "<th>Pengarang</th>";
	echo "</tr>";
	$totalbuku= 0;
	while($rowdpinjam = mysqli_fetch_assoc($hasildpinjam)){
		echo "<tr>";
		echo "<td align='right'>".$rowdpinjam['judul']."</td>";
		echo "<td align='right'>".$rowdpinjam['pengarang']."</td>";
		echo "</tr>";
		$totalbuku = $totalbuku + $rowdpinjam['qty'];
	}
	echo "<tr>";
	echo "<td colspan='3' align='right'>";
	echo "<strong>Total Buku</strong></td>";
	echo "<td align='right'><strong>$totalbuku</strong></td>";
	echo "</tr>";
	echo "</table>";
	echo "</pre>";
	?>
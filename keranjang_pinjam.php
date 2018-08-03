<?php
	$buku_pilih =0;
	if(isset($_COOKIE['keranjang'])){
	$buku_pilih = $_COOKIE['keranjang'];
	}
	if(isset($_GET['idbuku'])){
	$idbuku = $_GET['idbuku'];
	$buku_pilih = $buku_pilih .", ".$idbuku;
	setcookie ('keranjang', $buku_pilih, time()+3600);
	}
	include "koneksi.php";
	$sql= "select * from buku where idbuku in (".$buku_pilih.")
			order by idbuku desc";
	$hasil=mysqli_query($kon, $sql);
	if (!$hasil)
		die ("Gagal query..".mysqli_error());
?>
<h2>KERANJANG PEMINJAMAN</h2>
<table border="1" cellspacing="0" cellpadding="5">
	<tr>
		<th>Kode</th>
		<th>Judul Buku</th>
		<th>Pengarang</th>
		<th>Penerbit</th>
		<th>Jumlah Stok</th>
		<th>Foto Sampul</th>
		<th>Operasi</th>
	</tr>
<?php
	$no=0;
	while($row=mysqli_fetch_assoc($hasil)){
		echo "<tr>";
		echo "<td>".$row['kode']."</td>";
		echo "<td>".$row['judul']."</td>";
		echo "<td>".$row['pengarang']."</td>";
		echo "<td>".$row['penerbit']."</td>";
		echo "<td>".$row['stok']."</td>";
		echo "<td> <a href='pict/{$row['foto']}'/>
				<img src='thumb/t_{$row['foto']}'width='100'/>
				</a></td>";
		echo "<td>";
		echo "<a href='".$_SERVER['PHP_SELF']."?idbuku=".
			$row['idbuku']."'>BATAL</a>";
		echo "</td>";
		echo " </tr>";
	}
?>
</table>
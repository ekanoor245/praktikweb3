<?php
$kode="";
if(isset($_POST["kode"]))
	$nama_barang = $_POST["kode"];

	include "koneksi.php";
	$sql= "select * from buku";
	$hasil=mysqli_query($kon, $sql);
	if (!$hasil)
		die ("Gagal query..".mysqli_error($kon));
	
	$row = mysqli_fetch_assoc($hasil);
	$kode = $row['kode'];
	$judul = $row['judul'];
	$pengarang = $row['pengarang'];
	$penerbit = $row['penerbit'];
	$foto = $row['foto'];
	$stok = $row['stok'];
?>
<a href="buku_isi.php">INPUT BUKU</a>
&nbsp; &nbsp; &nbsp;
<a href="buku_cari.php">CARI BUKU</a>
&nbsp; &nbsp; &nbsp;
<a href="buku_tampil.php">DAFTAR BUKU</a>
<br/><br/>
<table border="1" cellspacing="0" cellpadding="5">
	<?php
		echo"<tr><td colspan='2' align='center'><h2> Informasi Buku</h2></td></tr><br/>";
		echo "<tr>";
		echo "<td colspan ='2' align='center'>
			<a href='pict/{$row['foto']}'/>
			<img src='thumb/t_{$row['foto']}' width='200' height='280'/>
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
mysqli_close($kon);
	?>
</table>
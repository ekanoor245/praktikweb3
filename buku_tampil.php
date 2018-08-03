<?php
$judul="";
if(isset($_POST["judul"]))
	$nama_barang = $_POST["judul"];
$pengarang="";
if(isset($_POST["pengarang"]))
	$nama_barang = $_POST["pengarang"];

	include "koneksi.php";
	$sql= "select * from buku where kode like '%$judul%' or judul like'%$pengarang%'";
	$hasil=mysqli_query($kon, $sql);
	if (!$hasil)
		die ("Gagal query..".mysqli_error($kon));
?>
<a href="buku_isi.php">INPUT BUKU</a>
&nbsp; &nbsp; &nbsp;
<a href="buku_cari.php">CARI BUKU</a>
<br/><br/>
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
		echo "<a href='buku_informasi.php'?idbuku=".$row['idbuku']."'>LIHAT</a>";
		echo "&nbsp&nbsp";
		echo "<a href='buku_edit.php?idbuku=".$row['idbuku']."'>EDIT </a>";
		echo "&nbsp&nbsp";
		echo "<a href='buku_hapus.php?idbuku=".$row['idbuku']."'>HAPUS</a>";
		echo " </tr>";
	}
?>
</table>
<?php
	$idbuku = $_GET["idbuku"];
	include "koneksi.php";
	$sql = "select * from buku where idbuku = '$idbuku'";
	$hasil = mysqli_query($kon,$sql);
	if (!$hasil) die ("gagal query...");
	
	$data = mysqli_fetch_array($hasil);
	$kode		= $data["kode"];
	$judul		= $data["judul"];
	$pengarang	= $data["pengarang"];
	$penerbit	= $data["penerbit"];
	$stok		= $data["stok"];
	$foto		= $data["foto"];
?>
<form action="buku_simpan.php" method="post" enctype="multipart/form-data"/>
<input type="hidden" name="idbuku" value="<?php echo $idbuku;?> "/>
	<table border ="1" cellspacing="0" cellpadding="5">
	<tr><td colspan="2" align="center"><h2>ISI BUKU</h2></td></tr>
		<tr>
			<td>Kode</td>
			<td><input type="text" name="kode" value="<?php echo $kode; ?>" /></td>
		</tr>
		<tr>
			<td>Judul Buku</td>
			<td><input type="text" name="judul" value="<?php echo $judul; ?>"/></td>
		</tr>
		<tr>
			<td>Pengarang</td>
			<td><input type="text" name="pengarang" value="<?php echo $pengarang; ?>"/></td>
		</tr>
		<tr>
			<td>Penerbit</td>
			<td><input type="text" name="penerbit" value="<?php echo $penerbit; ?>"/></td>
		</tr>
		<tr>
			<td>Jumlah Stok</td>
			<td><input type="text" name="stok" value="<?php echo $stok; ?>"/></td>
		</tr>
		<tr>
			<td>Foto Sampul</td>
			<td><input type="file" name="foto"/>
			<input type="hidden" name="foto_lama" value="<?php echo $foto; ?>"/> <br/>
			<img src="<?php echo "thumb/t_".$foto; ?>" width="100px"/></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" value="Simpan" name="proses"/>
				<input type="reset" value="Reset" name="reset"/>
			</td>
		</tr>
	</table>
</form>
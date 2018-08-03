<form action="buku_simpan.php" method="post" enctype="multipart/form-data"/>
	<table border ="1" cellspacing="0" cellpadding="5">
	<tr><td colspan="2" align="center"><h2>ISI BUKU</h2></td></tr>
		<tr>
			<td>Kode</td>
			<td><input type="text" name="kode"/></td>
		</tr>
		<tr>
			<td>Judul Buku</td>
			<td><input type="text" name="judul"/></td>
		</tr>
		<tr>
			<td>Pengarang</td>
			<td><input type="text" name="pengarang"/></td>
		</tr>
		<tr>
			<td>Penerbit</td>
			<td><input type="text" name="penerbit"/></td>
		</tr>
		<tr>
			<td>Jumlah Stok</td>
			<td><input type="text" name="stok"/></td>
		</tr>
		<tr>
			<td>Foto Sampul</td>
			<td><input type="file" name="foto"/></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" value="Simpan" name="proses"/>
				<input type="reset" value="Reset" name="reset"/>
			</td>
		</tr>
	</table>
</form>
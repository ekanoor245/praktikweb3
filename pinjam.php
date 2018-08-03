<h2>DATA PEMINJAMAN BUKU</h2>
<table border="0" cellpadding="5" cellspacing="0">
<form action='simpan_pinjam.php' method="POST">
<tr>
	<td>Tanggal</td>
	<td>:&nbsp;<input type="text" name="tanggal"/></td>
</tr>
<tr>
	<td>Nama</td>
	<td>:&nbsp;<input type="text" name="nama"/></td>
</tr>
<tr>
	<td>Email</td>
	<td>:&nbsp;<input type="email" name="email"/></td>
</tr>
<tr>
	<td>No.Telp</td>
	<td>:&nbsp;<input type="text" name="notelp"/></td>
</tr>
<tr>
	<td colspan="2" align="center">
	<input type="submit" value="SIMPAN"/></td>
</tr>
</form>
</table>
<?php
	include_once("keranjang_pinjam.php");
?>

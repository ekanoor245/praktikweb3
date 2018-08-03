<div style="background:#9fc5e8; color:white">
<?php
		session_start();
		echo "<marquee>SELAMAT DATANG <br/></marquee>";
		echo "User &nbsp; : &nbsp;".$_SESSION["user"]."<br/>";
		echo "Nama&nbsp;: &nbsp;".$_SESSION["nama_lengkap"]."<br/>";
		echo "Akses&nbsp;: &nbsp;".$_SESSION["akses"]."<br/>";
	?>
		<hr/>
	<h1>INPUT DATA</h1>
<form method="post" action="tampil_data.php">
	<table border="0" cellpadding="5" cellspacing="0">
	<tr>
		<td>Nama</td>
		<td><input type="text" name="nama"/></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" value="LOGIN"/></td>
	</tr>
	</table>
</form>
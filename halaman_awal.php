<div style="background:#9fc5e8; color:white">
<?php
	session_start();
	if(!isset($_SESSION["user"])){
	echo"sesi sudah habis!<br/>
		<a href='login_form.php'>LOGIN LAGI</a>";
		exit;
	}
	echo "<marquee>SELAMAT DATANG <br/></marquee>";
	echo "User &nbsp; : &nbsp;".$_SESSION["user"]."<br/>";
	echo "Nama		  : &nbsp;".$_SESSION["nama_lengkap"]."<br/>";
?>
<hr/>
	<h2>MENU</h2>
	<a href="input_data.php">INPUT DATA</a> &nbsp; |
	<a href="tampil_data.php">TAMPILAN DATA</a> &nbsp; |
	<a href="logout.php">LOGOUT</a><br/>
</div>

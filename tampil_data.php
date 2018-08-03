<div style="background:#9fc5e8; color:white">
<?php
		session_start();
		echo "<marquee>SELAMAT DATANG <br/></marquee>";
		echo "User &nbsp; : &nbsp;".$_SESSION["user"]."<br/>";
		echo "Nama&nbsp;: &nbsp;".$_SESSION["nama_lengkap"]."<br/>";
		echo "Akses&nbsp;: &nbsp;".$_SESSION["akses"]."<br/>";
	?>
	<hr/>
	<h1>TAMPIL DATA</h1>
<?php
		echo "Nama&nbsp;: &nbsp;".$_POST["nama"]."<br/>";
?>
</div>
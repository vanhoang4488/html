<?php
$con = mysqli_connect('localhost', 'root', '', 'php');

$kq = mysqli_query($con, "select * from php.schools");
while($r = mysqli_fetch_array($kq)){
	echo "<p>{$r['ucode']}</p>";
}

mysqli_close($con);
?>
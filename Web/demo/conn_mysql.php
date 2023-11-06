<?php
$hostname = 'localhost';
$username = 'root';
$password = '';

$conn = new mysqli($hostname, $username, $password);

if($conn->connect_error){
	die("failed: ".$conn->connect_error);
} 
echo'successfull';

$mysql = 'create connection mysql';



?>
<!--
	sinhvien(id, name, ngaysinh)
	monhoc(id, name)
	lopmonhoc(id, idmonhoc, hocky)
	sinhvien_lopmonhoc(idsv, idlopmonhoc)
-->
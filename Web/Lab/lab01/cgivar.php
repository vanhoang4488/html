<?php
echo '<html><head><title>Thông tin request</title></head>';
echo '<body>';
echo '<p>Giá trị của biến môi trường là:</p>';
$p = $_SERVER['REQUEST_METHOD'];
echo '<p>REQUEST_METHOD: '.$p.'</p>';
if(isset($_SERVER['CONTENT_LENGTH']) ){
	$p = $_SERVER['CONTENT_LENGTH'];
	echo '<p>CONTENT_LENGTH: '.$p.'</p>'; 
}
$p = $_SERVER['QUERY_STRING'];
echo '<p>QUERY_STRING: '.$p.'</p>';
echo '</body> </html>';
function test(){
	foreach ($_GET as $key => $val) {
		echo '<strong>' . $key . ' => ' . $val . '</strong><br/>';
	}
}
test();

echo 'Tách xâu:  <br />';

function getsinput(){
	$xau = trim($_GET['xau']);
	$xau = strtolower($xau);
	$tachxau = preg_split("/[\s]+/", $xau);
	foreach ($tachxau as $key => $val) {
		$tachxau[$key] = ucfirst($val);
	};

	$xau = implode(" ", $tachxau);
	echo $xau;
}

getsinput();

echo '<br />';

function getvar($var){
	if( isset($_GET[$var]) ){
		echo $_GET[$var];
	}
}

getvar('name');
?>
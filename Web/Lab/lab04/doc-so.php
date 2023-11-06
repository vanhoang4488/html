<?php
include("E:\WebApps\library\stdlib_5.php");

echo htOpen("đọc số");
echo formOpen('myform', 'GET');
echo numberbox('bt_number');
echo cmd('Đọc', 'bt_submit');
echo formClose();
if( !empty($_GET['bt_number']) ){
	echo "<p>{$_GET['bt_number']}</p>";
};
echo htClose();

?>
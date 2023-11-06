<html><head><meta charset="UTF-8"><title>LOU</title></head><body>
<form name='LOU' method='post' action='lou.php' style='font-face: Verdana; font-size: 14pt'>
<?php
	$con = mysqli_connect ('localhost', 'root', '', 'php') or die ('Connecting error');
	
	
	
	$where = '';

	$uname = $_POST['uname'];
	$ucode = $_POST['ucode'];
	$cmd = $_POST['cmd'];
	$c = $_POST['c'];
	$rb = $_POST['rb'];
	switch ($cmd) {
		case 'Nhập':
			if ($uname=='' || $ucode=='')
				$errmess = 'Tên trường và mã trường phải khác rỗng';
			else {
				if ($rb!='')
					$sqlq = "update php.shcools set id='$ucode', name='$uname' where id='$rb'";
				else 
					$sqlq = "insert into php.shcools values ('$ucode', '$uname')";
				mysqli_query ($con, $sqlq) or die (mysql_error () . ': ' . $sqlq);
				$uname = $ucode = $rb = '';
			}
			break;
		case 'Xóa':
			if (is_array ($c)) 
				foreach ($c as $key => $val)
					mysqli_query ($con, "delete from php.shcools where id='$key'");
			else 
				$errmess = 'Phải đánh dấu ít nhất 1 dòng muốn xóa';
			break;
		case 'Tìm':
			$where = " where id like '%{$ucode}%' and name like '%{$uname}%'";
			break;
		default: 
			if ($rb!='') {
				$kq = mysqli_query ($con, "select * from universities where id='$rb'");
				$r = mysqli_fetch_array ($kq);
				$uname = $r['name'];
				$ucode = $r['id'];
			}
	}

// Hiển thị giao diện
	echo '<h3>QUẢN LÝ DANH SÁCH CÁC TRƯỜNG ĐẠI HỌC</h3><hr /><center>';
	echo '<table width="60%" border="0" style="font-face: Verdana; font-size: 14pt">';
	echo '<tr>';
	echo '<td width="25%">Tên Trường:</td>';
	echo "<td width='75%'><input type='text' name='uname' value='$uname' size='40'  style='font-face: Verdana; font-size: 14pt'></td>";
	echo '</tr>';
	
	echo '<tr>';
	echo '<td>Mã Trường:</td>';
	echo "<td><input type='text' name='ucode' value='$ucode' size='4' c></td>";
	echo '</tr>';

	echo '<tr align="center">';
	echo '<td colspan="2">
		<input type="submit" name="cmd" value="Nhập" style="font-face: Verdana; font-size: 14pt" /> 
		<input type="submit" name="cmd" value="Xóa" style="font-face: Verdana; font-size: 14pt" /> 
		<input type="submit" name="cmd" value="Tìm" style="font-face: Verdana; font-size: 14pt" />
	</td>';
	echo '</tr></table>';
	echo $errmess;
	echo '<table width="80%" border="1" style="font-face: Verdana; font-size: 14pt">';
	echo '<tr align="center"><td width="10%">STT</td><td width="5%"></td><td width="5%"></td><td width="25%">Mã trường</td><td width="55%">Trên trường</td></tr>';
	$kq = mysqli_query($con, "select * from php.shcools $where");
	$ci = 1;
	while ( $r = mysqli_fetch_array($kq) ) {
		$checked = $r['id'] == $rb ? 'checked' : '';
		echo "<tr align='center'>
			<td>$ci</td>
			<td><input type='checkbox' name='c[{$r['id']}]' value='1' /></td>
			<td><input type='radio' name='rb' value='{$r['id']}' $checked onClick='submit()'></td>
			<td>{$r['id']}</td>
			<td align='left'> {$r['name']}</td>
			</tr>";
		$ci++;
	}
	echo '</table></center>';

?>
</form></body></html>

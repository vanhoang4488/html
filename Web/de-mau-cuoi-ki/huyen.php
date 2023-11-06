<?php
// Xây dựng ứng dụng cập nhật bảng dữ liệu tinh với đẩy đủ các chức năng:
// thêm, sửa, xóa, tìm kiếm 
include 'stdlib.php';
$con = mysqli_connect ('127.0.0.1', 'root', '', 'php');
$rb = isset ($_POST['rb']) ? $_POST['rb'] : '';
$matinh = isset ($_POST['lb']) ? $_POST['lb'] : '';
$ma = isset ($_POST['ma']) ? $_POST['ma'] : '';
$ten = isset ($_POST['ten']) ? $_POST['ten'] : '';

if ($matinh=='')
	$sqlq = 'select a.id, a.idtinh, b.name as tname, a.name from huyen a left join tinh b on a.idtinh=b.id';
else
	$sqlq = "select a.id, a.idtinh, b.name as tname, a.name from huyen a left join tinh b on a.idtinh=b.id where a.idtinh='$matinh'";

switch ($_POST['cmd']) {
	case 'Nhập':
		if ($ma!='' && $ten!='') {
			if ($rb=='')
				addrow ();
			else 
				rowupdate ();
		} else
			$errmess = 'Mã và tên tỉnh phải khác rỗng!'; 
		break;
	case 'Xóa':
		if (is_array ($_POST['c'])) {
			foreach ($_POST['c'] as $key => $val)
				mysqli_query ($con, "delete from huyen where concat(idtinh, id)='$key'");
		} else
			$errmess = 'Phải đánh dấu ít nhất 1 dòng mà bạn muốn xóa!'; 
		break;
	case 'Tìm':
		$sqlq = "select a.id, a.idtinh, b.name as tname, a.name from huyen a left join tinh b on a.idtinh=b.id where idtinh='$matinh' name like '%$ten%' and id like '%$ma%'";
		break;
	default: 
		if ($rb != '') {
			$kq = mysqli_query ($con, "select * from huyen where idtinh='$matinh' and id='$rb'");
			$r = mysqli_fetch_array ($kq);
			$ma = $r['id'];
			$ten = $r['name'];
		} else {
			$ma = $ten = '';
		}
		break;
}

echo htOpen ('huyen') . formOpen ('huyên');
echo 'Quản lý danh sách Huyện / Thị<hr><center>';
echo tblOpen ('0', '80%');
echo tr (td ('Tên tỉnh:', '40%') . td (lb ('tinh', $matinh), '60%'));
echo tr (td ('Tên huyện:') . td (textbox ('ten', $name, '10'), '60%'));
echo tr (td ('Mã huyện:') . td (textbox ('ma', $ma, '10'), '60%'));
echo tr (td (cmd ('Nhập') . cmd ('Xóa') . cmd ('Tìm'), '', '', '', '2'), 'center');
echo tblClose ();
$kq = mysqli_query ($con, $sqlq);
echo tblOpen ('1', '100%');
echo $errmess . '<br>';
echo tr (td('STT', '10%').td(' ', '5%').td(' ', '5%').td('Mã huyện', '10%').td('Tên tỉnh', '45%').td('Tên huyện', '35%'), 'center');
$ci = 1;
while ($r = mysqli_fetch_array ($kq))
	echo tr ( td($ci++) . td(cb('c['.$r['idtinh'].$r['id'].']')).td( rb($r['idtinh'].$r['id'], $rb) ) . td($r['id']) . td($r['tname']) . td($r['name']), 'center');
echo tblClose () . '</center>';
echo formClose(). htClose ();

function addrow () {
	global $con, $ma, $matinh, $ten, $errmess;
	$kq = mysqli_query ($con, "select * from huyen where idtinh='$matinh' and (id='$ma' or name='$ten')");
	if (mysqli_num_rows ($kq)>0) 
		$errmess = "Đã có mã $ma hoặc đã có tên $ten";
	else {
		mysqli_query ($con, "insert into huyen values ('$ma', '$matinh', '$ten')") or die (mysqli_error ($con) . ' in insert');
		$rb = $ma = $ten = '';
	}
}

function rowupdate () {
	global $con, $ma, $matinh, $ten, $rb, $errmess;
	$kq = mysqli_query ($con, "select * from huyen where idtinh='$matinh' and (id='$ma' or name='$ten') and id!='$rb'");
	if (mysqli_num_rows ($kq)>0) 
		$errmess = "Đã có mã $ma hoặc đã có tên $ten";
	else { 
		mysqli_query ($con, "update tinh set id='$ma', name='$ten' where id='$rb'") or die (mysqli_error ($con) . ' in update: ' . "update tinh set id='$ma', name='$ten' where id='$rb'");
		$rb = $ma = $ten = '';
	}
}

?>



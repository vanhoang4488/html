<?php
// Thư viện các hàm kết xuất thông tin html

function htOpen ($title='notitle', $style='font-size: 16pt') {
	$style = $style=='' ? '' : " style='$style'";
	return "<html><head><meta charset='utf-8'><title>$title</title></head><body{$style}>";
}

function htClose () {
	return '</body></html>';
}

function formOpen ($name='myform', $method='POST', $action='', $style='font-size: 16pt') {
	$action = $action=='' ? $_SERVER['PHP_SELF'] : $action;
	$style = $style=='' ? '' : " style='$style'";
	return "<form name='$name' method='$method' action='$action'{$style}>";
}

function formClose () {
	return '</form>';
}

function tblOpen ($border='1', $width='100%', $cellspacing='0', $cellpadding='0', $style='style="border-collapse: collapse; font-size:16pt;"') {
	return "<table width='$width' border='$border' cellspacing='$cellspacing' cellpadding='$cellpadding'
	style='$style'>";
}

function tblClose () {
	return '</table>';
}

function td ($content='&nbsp;', $width='', $align='', $valign='', $colspan='', $rowspan='') {
	$width= $width=='' ? '' : " width='$width'";
	$align= $align=='' ? '' : " align='$align'";
	$valign= $valign=='' ? '' : " valign='$valign'";
	$colspan= $colspan=='' ? '' : " colspan='$colspan'";
	$rowspan= $rowspan=='' ? '' : " rowspan='$rowspan'";
	return "<td{$width}{$align}{$valign}{$colspan}{$rowspan}>$content</td>";
}

function tr ($content, $align='', $valign='') {
	$align= $align=='' ? '' : " align='$align'";
	$valign= $valign=='' ? '' : " valign='$valign'";
	return "<tr{$align}{$valign}>$content</tr>";
}

?>




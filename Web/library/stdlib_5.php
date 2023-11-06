<?php
// Thư viện các hàm

function htOpen ($title='notitle') {
	return "<html><head><meta charset='UTF-8'><title>$title</title></head><body>";
}

function htClose () {
	return '</body></html>';
}

function formOpen ($name='myform', $method='', $action='') {
	$method = $method=='' ? 'POST' : $method;
	$action = $action=='' ? '' : $action;
	return "<form name='$name' method='$method' action='$action'>";
}

function formClose () {
	return '</form>';
}

// <input type='text' name='...' value='...' size='...' maxlength='...' />
function textbox ($name='txt', $value='', $size='', $maxlength='') {
	$value = $value=='' ? '' : " value='$value'";
	$size = $size=='' ? '' : " size='$size'";
	$maxlength = $maxlength=='' ? '' : " maxlength='$maxlength'";
	return "<input type='text' name='$name'{$value}{$size}{$maxlength} />";
}

function numberbox ($name='txt', $value='', $size='', $maxlength='') {
	$value = $value=='' ? '' : " value='$value'";
	$size = $size=='' ? '' : " size='$size'";
	$maxlength = $maxlength=='' ? '' : " maxlength='$maxlength'";
	return "<input type='number' name='$name'{$value}{$size}{$maxlength} />";
}

// <input type='checkbox' name='..' value='..' [checked] />
function chkbox ($name='cb', $value='1', $currentval='') {
	$checked = $currentval==$value ? ' checked' : '';
	return "<input type='checkbox' name='$name' value='$value'{$checked} />";
}

// <input type='radio' name='..' value='..' [checked] />
function rb ($currentval='', $value='1', $name='rb', $submit='') {
	$checked = $currentval==$value ? ' checked' : '';
	$submit = $submit=='' ? '' : " onClick='$submit'";
	return "<input type='radio' name='$name' value='$value'{$checked}{$submit} />";
}

// <input type='submit' name='..' value='..' />
function cmd ($value='Ok', $name='cmd') {
	return "<input type='submit' name='$name' value='$value' /> ";
}

// <input type='button' name='..' value='..' onClick='...' />
function button ($value='Ok', $script='', $name='cmd') {
	$script = $script=='' ? '' : " onClick=' $script";
	return "<input type='button' name='$name' value='$value'{$script} /> ";
}

// <select name ='...' >
//			<option value='...' selected>...</optiop>
//			<option value='...'>...</option>
//			...
//	</select>

function listbox ($tblname, $name='lb', $curentval='', $srcipt='') {
	$srcipt = $srcipt=='' ? '' : " onChange='$srcipt'";
	$retval = "<select name='$name'{$srcipt}><option value=' '>Chọn ... </option>";
	$kq = mysql_query ("select * from $tblname");
	while ($r = mysql_fetch_array ($kq)) {
		$selected = $r['id'] == $curentval ? ' selected' : '';
		$retval .= "<option value='{$r['id']}'{$selected}>{$r['name']}</option>";
	}
	$retval .= '</selected>';
	return $retval;
}

// <table width='..' border='..' cellspacing='..' cellpadding='..'  style='...'
function tblOpen ($width='100%', $border='1', $style='', $cellspacing='', $cellpadding='') {
	$style = $style=='' ? ' style="border-collapse: collapse"' : " style='$style'";
	$cellspacing = $cellspacing=='' ? '' : " cellspacing='$cellspacing'";
	$cellpadding = $cellpadding=='' ? '' : " cellpadding='$cellpadding'";
	return "<table width='$width' border='$border'{$cellspacing}{$cellpadding}{$style}>";
}

function tblClose () {
	return '</table>';
}

// <tr align='...' valign='...'> ... </tr> 
function tr ($content, $align='', $valign='') {
	$align = $align=='' ? '' : " align='$align'";
	$valign = $valign=='' ? '' : " valign='$valign'";
	return "<tr{$align}{$valign}>$content</tr>";
}

// <td width='..' align='...' valign='...' colspan='..' rowspan='..'>...</td>
function td ($content='&nbsp;', $align='', $width='', $colspan='', $rowspan='', $valign='') {
	$align = $align=='' ? '' : " align='$align'";
	$width = $width=='' ? '' : " width='$width'";
	$colspan = $colspan=='' ? '' : " colspan='$colspan'";
	$rowspan = $rowspan=='' ? '' : " rowspan='$rowspan'";
	$valign = $valign=='' ? '' : " valign='$valign'";
	return "<td{$width}{$align}{$valign}{$colspan}{$rowspan}>$content</td>" ;
}

?>

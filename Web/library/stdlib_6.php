<?php
function htOpen ($title='noname') {
	return "<html><head><meta charset='UTF-8'><title>$title</title></head><body>";
}

function htClose () {
	return '</body></html>';
}

function formOpen ($method='POST', $name='', $action='') {
	$name = $name=='' ? '' : " name='$name'";
	$action = $action=='' ? $PHP_SELF : $action;
	return "<form{$name} method='$method' action='$action'>";
}

function formClose () {
	return '</form>';
}

// <input type='text' name='...' value='...' size='...' maxlength='...' />
function txtbox ($name='txt', $value='', $size='', $maxlength='') {
	$value = $value=='' ? '' : " value='$value'";
	$size = $size=='' ? '' : " size='$size'";
	$maxlength = $maxlength=='' ? '' : " maxlength='$maxlength'";
	return "<input type='text' name='$name'{$value}{$size}{$maxlength} />";
}

// <input type='checkbox' name='..' value='..' />
function cb ($name='cb', $value='1') {
	return "<input type='checkbox' name='$name' value='$value' />";
}

// <input type='radio' name='..' value='..' onClick='...' [checked] />
function rb ($value=' ', $current='', $script='', $name='rb') {
	$script = $script=='' ? '' : " onClick='$script'";
	$checked = $value==$current ? ' checked' : '';
	return "<input type='radio' name='$name' value='$value'{$checked}{$script} />";
}

// <input type='submit' name='...' value='..' />
function cmd ($value='Ok', $name='cmd') {
	return "<input type='submit' name='$name' value='$value' />";
}

// <table width='..' border='..' cellspacing='..' cellpadding='' style='..'> 
function tblOpen ($width='100%', $border='0', $cellspacing='', $cellpadding='', $style='') {
	$cellspacing = $cellspacing=='' ? '' : " cellspacing='$cellspacing'";
	$cellpadding = $cellpadding=='' ? '' : " cellpadding='$cellpadding'";
	$style = $style=='' ? ($border=='1' ? ' style="border-collapse: collapse"' : '') : " style='$style'";
	return "<table width='$width' border='$border'{$cellspacing}{$cellpadding}{$style}>";
}

function tblClose () {
	return '</table>';
}

// <tr align='..'>content</tr>
function tr ($content, $align='') {
	$align = $align=='' ? '' : " align='$align'";
	return "<tr{$align}>$content</tr>";
}

// <td width='..' align='..' valign='..' colspan='..' rowspan'..'>content</td>
function td ($content='&nbsp;', $align='', $width='', $colspan='', $rowspan='', $valign='') {
	$align = $align=='' ? '' : " align='$align'";
	$valign = $valign=='' ? '' : " valign='$valign'";
	$width = $width=='' ? '' : " width='$width'";
	$colspan = $colspan=='' ? '' : " colspan='$colspan'";
	$rowspan = $rowspan=='' ? '' : " rowspan='$rowspan'";
	return "<td{$width}{$align}{$valign}{$colspan}{$rowspan}>$content</td>";
}

// <select name='..' onChange='submit()'>
//		<option value='..' selected>...</option>
//		...
// </select>

function listbox ($tblname, $name='lb', $currentval='', $script='', $optval='id', $optdsp='name') {
	$script = $script=='' ? '' : " onChange='$script'";
	$retval = "<select name='$name'{$script}><option value=''>Chọn... </option>";
	$kq = mysql_query ("select $optval as id, $optdsp as name from $tblname");
	while ($r = mysql_fetch_array ($kq)) {
		$selected = $r['id'] == $currentval ? ' selected' : '';
		$retval .= "<option value='{$r['id']}'{$selected}>{$r['name']}</option>";
	}
	$retval .= '</select>';
	return $retval;
}
?>

<?php
function format_data($data)
{
	$data = strstr($data, ' ', true);
	$x = explode('-', $data);
	$data = $x[2].'/'.$x[1].'/'.$x[0];
	return $data;
}
?>
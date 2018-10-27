<?php 
function verifyEmpty($array_campos)
{	
	foreach ($array_campos as $key => $value) 
	{
		if (empty($_POST[$value]) or !isset($_POST[$value])) 
		{
			echo "<script>alert('Por favor preencha o campo ".$value." !')</script>";
			exit();
		} 
	}
	return $array_campos;
}
?>
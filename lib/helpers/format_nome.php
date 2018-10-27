<?php
function format_nome($id_chamado)
{
	$array_nomes = array(
		'Técnico Manutenção' => '2',
		'Gestor Manutenção' => '3',
		'Técnico Eletrônica' => '4',
		'Gestor Eletrônica' => '5',
		'Técnico Mecânica' => '6',
		'Gestor Mecânica' => '7',
		'Técnico Informática' => '8',
		'Gestor Informática' => '9',
	);
	return $result = array_search($id_chamado, $array_nomes);
}
?>
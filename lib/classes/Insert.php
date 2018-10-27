<?php
/**
 * Classe Insert para realização de cadastros das ordens de serviço em suas respectivas tabelas.
 */
class Insert
{
	private $stmt, $db_conn, $row;
	private $params = array();

	function __construct()
	{
		$this->db_conn = Db_config::connect();
	}

	public function insert_into($tabela, $campos)
	{
		$this->capturaForm($campos);

			if (empty($_POST['forn_material']) and empty($_POST['desc_material'])) 
			{
				$this->sqlQuery("INSERT INTO ".$tabela." (id_chamado, responsavel, resumo, sala, finalidade, descricao, ativo, acao) VALUES (?, ?, ?, ?, ?, ?, 'Ativo', 'Atender')", $this->params);
			} else
			{
					$this->sqlQuery("INSERT INTO ".$tabela." (id_chamado, responsavel, resumo, sala, finalidade, descricao, material_fornecimento, material_descricao, ativo, acao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'Ativo', 'Atender')", $this->params);
			}

		if ($this->stmt == true)
		{
			return true;
		} else
		{
			return false;
		}
	}

	private function capturaForm($array_campos)
	{
		foreach ($array_campos as $key => $value)
		{
			$this->params[$value] = $_POST[$value];
		}
		$this->params = array_values($this->params);
	}

	private function sqlQuery($sql, $parametros)
	{
		$this->stmt = $this->db_conn->prepare($sql);
		$this->stmt->execute($parametros);
	}
}
?>

<?php 
/**
 * Classe Atender para realizar updates no status: de Ativo para Em andamento e Em andamento para Finalizado
 */
class Atender 
{
	private $db_conn, $stmt;

	function __construct()
	{
		$this->db_conn = Db_config::connect();
	}

	public function atender()
	{
		if ($_GET['id'] == '2' or $_GET['id'] == '3') 
		{
			$this->sqlQuery('tb_os_manutencao');

		} elseif ($_GET['id'] == '4' or $_GET['id'] == '5') 
		{
			$this->sqlQuery('tb_os_eletronica');

		} elseif ($_GET['id'] == '6' or $_GET['id'] == '7') 
		{
			$this->sqlQuery('tb_os_mecanica');

		} elseif ($_GET['id'] == '8' or $_GET['id'] == '9')  
		{
			$this->sqlQuery('tb_os_informatica');
		}
	}

	private function sqlQuery($tabela)
	{
		if (isset($_GET['status']) and $_GET['status'] == 'Ativo') 
		{
			$this->stmt = $this->db_conn->prepare("UPDATE ".$tabela." SET ativo = 'Em-andamento' WHERE id_os = ".$_GET['id_chamado']." ");
			$this->stmt->execute();

			if ($this->stmt == true) 
			{
				header("Location: ../../conteudo/index.php");
			} else
			{
				echo "<h3>Ocorreu algum erro</h3>";
				exit();
			}
		} elseif (isset($_GET['status']) and $_GET['status'] == 'Em-andamento') 
		{
			$this->stmt = $this->db_conn->prepare("UPDATE ".$tabela." SET ativo = 'Finalizado' WHERE id_os = ".$_GET['id_chamado']." ");
			$this->stmt->execute();

			if ($this->stmt == true) 
			{
				header("Location: ../../conteudo/index.php");
			} else
			{
				echo "<h3>Ocorreu algum erro</h3>";
				exit();
			}
		}
	}
}
?> 
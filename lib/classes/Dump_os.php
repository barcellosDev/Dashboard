<?php
/**
 * Classe Dump_os para manipular seus chamados no painel
 */
class Dump_os
{
	private $db_conn, $stmt, $rows, $dados;

	function __construct()
	{
		$this->db_conn = Db_config::connect();
	}

	public function dump_os()
	{
		if ($_SESSION['login_id'] == '2' or $_SESSION['login_id'] == '3')
		{
			$this->sqlQuery('tb_os_manutencao');

		} elseif ($_SESSION['login_id'] == '4' or $_SESSION['login_id'] == '5')
		{
			$this->sqlQuery('tb_os_eletronica');

		} elseif ($_SESSION['login_id'] == '6' or $_SESSION['login_id'] == '7')
		{
			$this->sqlQuery('tb_os_mecanica');

		} elseif ($_SESSION['login_id'] == '8' or $_SESSION['login_id'] == '9')
		{
			$this->sqlQuery('tb_os_informatica');
		}
	}

	private function sqlQuery($tabela)
	{
		$this->stmt = $this->db_conn->prepare("SELECT * FROM ".$tabela."");
		$this->stmt->execute();

		if ($this->stmt->rowCount() > 0)
		{
			while ($this->rows = $this->stmt->fetch(PDO::FETCH_ASSOC))
			{
				echo ("
					<tr>
                     <td>".$this->rows['id_os']."</td>
                     <td>".format_data($this->rows['date'])."</td>
                     <td>".$this->rows['resumo']."</td>
                     <td>".$this->rows['responsavel']."</td>
                     <td>".format_ativo($this->rows['ativo'])."</td>
                     <td>".format_acao($this->rows['acao'], $this->rows['ativo'], $this->rows['id_os'], $_SESSION['login_id'])."</td>
                 	</tr>
					");
			}
		} else
		{
			echo ("
					<tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 	</tr>
				");
		}
	}
	private function query_meu_chamado($id)
	{
		$this->stmt = $this->db_conn->prepare("SELECT * FROM TB_OS_MANUTENCAO ma
		INNER JOIN TB_OS_ELETRONICA el ON el.id_chamado = ma.id_chamado
		INNER JOIN TB_OS_MECANICA me ON me.id_chamado = el.id_chamado
		INNER JOIN TB_OS_INFORMATICA inf ON inf.id_chamado = me.id_chamado
		WHERE me.id_chamado = ".$id."");

		$this->stmt->execute();

		if ($this->stmt->rowCount() > 0)
		{
			while ($this->rows = $this->stmt->fetch(PDO::FETCH_ASSOC))
			{
				echo ("
									<tr>
                     <td>".$this->rows['id_os']."</td>
                     <td>".format_data($this->rows['date'])."</td>
                     <td>".$this->rows['resumo']."</td>
                     <td>".$this->rows['responsavel']."</td>
                     <td>".format_ativo($this->rows['ativo'])."</td>
                     <td>".$this->format_acao_meu_chamado($this->rows['ativo'], $this->rows['acao'])."</td>
                 	</tr>
					");
			}
		} else
		{
			echo ("
									<tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 	</tr>
				");
		}
	}

	public function meuChamado()
	{
		if ($_SESSION['login_id'] == '2' or $_SESSION['login_id'] == '3')
		{
			$this->query_meu_chamado('2');

		} elseif ($_SESSION['login_id'] == '4' or $_SESSION['login_id'] == '5')
		{
			$this->query_meu_chamado('4');

		} elseif ($_SESSION['login_id'] == '6' or $_SESSION['login_id'] == '7')
		{
			$this->query_meu_chamado('6');

		} elseif ($_SESSION['login_id'] == '8' or $_SESSION['login_id'] == '9')
		{
			$this->query_meu_chamado('8');
		}
	}

	private function format_acao_meu_chamado($status, $acao)
	{
		switch ($status)
		{
			case 'Ativo':
				return $acao = '<div class="btn-group">
								  <a class="btn btn-danger btn-sm" href="../lib/helpers/excluir.php?id_os='.$this->rows['id_os'].'&id_chamado='.$this->rows['id_chamado'].'">
								    <i class="far fa-trash-alt"></i> Excluir
								  </a>
								  <button type="button" class="btn btn-sm btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <div class="dropdown-menu">
								    <a class="dropdown-item" href="../lib/helpers/parar.php">Parar chamado</a>
								  </div>
								</div>';
				break;

			case 'Em-andamento':
				return $acao = '<div class="btn-group">
								  <a class="btn btn-danger btn-sm" href="../lib/helpers/excluir.php?id_os='.$this->rows['id_os'].'&id_chamado='.$this->rows['id_chamado'].'">
								    <i class="far fa-trash-alt"></i> Excluir
								  </a>
								  <button type="button" class="btn btn-sm btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <div class="dropdown-menu">
								    <a class="dropdown-item" href="../lib/helpers/parar.php">Parar chamado</a>
								  </div>
								</div>';
				break;

			case 'Finalizado':
				return $acao = '<a class="btn btn-danger btn-sm" href="../lib/helpers/excluir.php?id_os='.$this->rows['id_os'].'&id_chamado='.$this->rows['id_chamado'].'">
								    <i class="far fa-trash-alt"></i> Excluir
								  </a>
								  ';
				break;

			case 'Parado':
				return $acao = '<div class="btn-group">
								  <a class="btn btn-danger btn-sm" href="../lib/helpers/excluir.php?id_os='.$this->rows['id_os'].'&id_chamado='.$this->rows['id_chamado'].'">
								    <i class="far fa-trash-alt"></i> Excluir
								  </a>
								  <button type="button" class="btn btn-sm btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <div class="dropdown-menu">
								    <a class="dropdown-item" href="../lib/helpers/parar.php">Parar chamado</a>
								  </div>
								</div>';
				break;
		}
	}
}
?>

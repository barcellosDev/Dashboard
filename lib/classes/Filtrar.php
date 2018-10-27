<?php
/**
 * Classe Filtrar para filtrar chamados por campo
 */
class Filtrar
{
  private $db_conn, $stmt, $rows;

  function __construct()
  {
    $this->db_conn = Db_config::connect();
  }

  public function mostraFiltrado()
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
    $f = $_POST['filtro'];

    $this->stmt = $this->db_conn->prepare("SELECT * FROM ".$tabela." WHERE id_os LIKE '%$f%' OR id_chamado LIKE '%$f%' OR responsavel LIKE '%$f%' OR resumo LIKE '%$f%' OR sala LIKE '%$f%' OR finalidade LIKE '%$f%' OR descricao LIKE '%$f%' OR material_fornecimento LIKE '%$f%' OR material_descricao LIKE '%$f%' OR ativo LIKE '%$f%' OR acao LIKE '%$f%' OR date LIKE '%$f%'");
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
      echo "<h2>Não encontrado!</h2>";
    }
  }
}

?>

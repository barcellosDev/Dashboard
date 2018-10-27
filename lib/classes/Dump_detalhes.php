<?php
/**
 *
 */
class Dump_detalhes
{
  private $db_conn, $stmt, $row, $dados, $dados_usuario;

  function __construct()
  {
    $this->db_conn = Db_config::connect();
  }

  public function dump_detalhes()
  {
    if ($_GET['id'] == '2' or $_GET['id'] == '3')
    {
      return $this->sqlQuery('tb_os_manutencao');

    } elseif ($_GET['id'] == '4' or $_GET['id'] == '5')
    {
      return $this->sqlQuery('tb_os_eletronica');

    } elseif ($_GET['id'] == '6' or $_GET['id'] == '7')
    {
      return $this->sqlQuery('tb_os_mecanica');

    } elseif ($_GET['id'] == '8' or $_GET['id'] == '9')
    {
      return $this->sqlQuery('tb_os_informatica');
    }
  }

  private function sqlQuery_material($tabela)
  {
    $this->stmt = $this->db_conn->prepare("SELECT material_fornecimento, material_descricao FROM ".$tabela." WHERE id_os = ".$_GET['id_chamado']);

    $this->stmt->execute();

    if ($this->stmt->rowCount() > 0)
    {
      while ($this->row = $this->stmt->fetch(PDO::FETCH_ASSOC))
      {
        $this->dados[] = $this->row;
      }
      return $this->dados;
    }
  }

  public function dump_detalhes_material()
  {
    if ($_GET['id'] == '2' or $_GET['id'] == '3')
    {
      return $this->sqlQuery_material('tb_os_manutencao');

    } elseif ($_GET['id'] == '4' or $_GET['id'] == '5')
    {
      return $this->sqlQuery_material('tb_os_eletronica');

    } elseif ($_GET['id'] == '6' or $_GET['id'] == '7')
    {
      return $this->sqlQuery_material('tb_os_mecanica');

    } elseif ($_GET['id'] == '8' or $_GET['id'] == '9')
    {
      return $this->sqlQuery_material('tb_os_informatica');
    }
  }

  private function sqlQuery($tabela)
  {
    $this->stmt = $this->db_conn->prepare("SELECT * FROM ".$tabela." WHERE id_os = ".$_GET['id_chamado']."");
    $this->stmt->execute();

    if ($this->stmt->rowCount() > 0)
    {
       while ($this->row = $this->stmt->fetch(PDO::FETCH_ASSOC))
       {
          $this->dados[] = $this->row;
       }
       return $this->dados;
    } else
    {
      echo "Não encontrado!";
      exit();
    }
  }

  private function sqlQuery_email($email_chamado)
  {
    $this->stmt = $this->db_conn->prepare("SELECT email FROM tb_usuarios WHERE id = ".$email_chamado."");
    $this->stmt->execute();

    if ($this->stmt->rowCount() == 1)
    {
      while ($this->rows = $this->stmt->fetch(PDO::FETCH_ASSOC))
      {
        $this->dados[] = $this->rows;
      }
      return $this->dados;
    }
  }

  public function dump_detalhes_usuario($email_chamado)
  {
     return $this->sqlQuery_email($email_chamado);
  }
}

?>

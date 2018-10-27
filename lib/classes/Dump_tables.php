<?php
/**
 *
 */
class Dump_tables
{
  private $db_conn, $stmt, $row;
  private $dados = array();

  function __construct()
  {
    $this->db_conn = Db_config::connect();
  }

  public function dump_table($campo, $tabela)
  {
    $this->stmt = $this->db_conn->prepare("SELECT ".$campo." FROM ".$tabela."");
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

  public function dump_id_os($tabela)
  {
    $this->stmt = $this->db_conn->prepare("SELECT id_os FROM ".$tabela."");
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
}

?>

<?php
/**
 *
 */
class Dump_user
{
  private $stmt, $db_conn, $rows;

  function __construct()
  {
    $this->db_conn = Db_config::connect();
  }

  private function query($consulta)
  {
    $this->stmt = $this->db_conn->prepare($consulta);
    $this->stmt->execute();
  }

  public function dump($sql_campo)
  {
    $this->query("SELECT ".$sql_campo." FROM tb_usuarios WHERE id = ".$_SESSION['login_id']);

    if ($this->stmt->rowCount() == 1)
    {
      $this->rows = $this->stmt->fetch(PDO::FETCH_ASSOC);
      switch ($this->rows)
      {
        case $sql_campo == 'id':
          return $this->rows['id'];
          break;

        case $sql_campo == 'nome':
          return $this->rows['nome'];
          break;

        case $sql_campo == 'num_usp':
          return $this->rows['num_usp'];
          break;

        case $sql_campo == 'email':
          return $this->rows['email'];
          break;
      }
    } else
    {
      echo "Error!";
      exit();
    }
  }
}

?>

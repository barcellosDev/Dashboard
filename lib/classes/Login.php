<?php
/**
 *
 */
class Login
{
  private $stmt, $db_conn, $rows, $params, $sql_query;

  function __construct()
  {
    $this->db_conn = Db_config::connect();
  }

  public function Loga()
  {
    if (isset($_POST['loga']))
    {
      if (!empty($_POST['num_usp']) and !empty($_POST['senha']))
      {
        $this->sql_query = "SELECT *
                            FROM tb_usuarios
                            WHERE num_usp = ? and senha = ?";

        $this->capturaForm(array('num_usp', 'senha'));

        $this->query($this->sql_query, $this->params);

        if ($this->stmt->rowCount() == 1)
        {
          $this->rows = $this->stmt->fetch(PDO::FETCH_ASSOC);

          $_SESSION['login_id'] = $this->rows['id'];
          header("Location: conteudo/index.php");
        } else
        {
          echo "<script>alert('Usuário incorreto!')</script>";
        }
      } else
      {
        echo "<script>alert('Preencha os campos!')</script>";
      }
    }
  }

  private function query($sql_query, $params)
  {
    $this->stmt = $this->db_conn->prepare($sql_query);
    $this->stmt->execute($params);
  }

  private function capturaForm($campos)
  {
    $this->params = array();

    foreach ($campos as $key => $value)
    {
      $this->params[$value] = $_POST[$value];
    }
    $this->params['senha'] = '40BD001563085FC35165329EA1FF5C5ECBDBBEEF';
    $this->params = array_values($this->params);
  }
}

?>

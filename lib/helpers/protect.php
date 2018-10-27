<?php
if (!isset($_SESSION['login_id']))
{
  header("Location: ../index.php");
}
?>

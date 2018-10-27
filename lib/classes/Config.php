<?php
session_start();
error_reporting(E_ALL);
const br = "<br>";
date_default_timezone_set('America/Sao_Paulo');

/**
 * Classe Db_config para conexão com o banco de dados.
 */
abstract class Db_config
{
  public static $db_name, $db_pass, $srv, $db, $db_user;

  public static function connect()
  {
    self::$db_name = 'dashboard';
    self::$db_pass = '';
    self::$srv = 'localhost';
    self::$db_user = 'root';

    self::$db = new PDO("mysql:host=".self::$srv.";dbname=".self::$db_name, self::$db_user, self::$db_pass, array(
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ));

    if (self::$db == true)
    {
      return self::$db;
    } else
    {
      echo "Ocorreu algum erro!";
    }
  }

  public static function pre_r($array)
  {
    echo "<pre>";
    print_r($array);
    echo "</pre>";
  }
}
?>

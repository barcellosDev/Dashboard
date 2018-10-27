<?php
// Função autoload para incluir classes de acordo com o instanciamento delas.
const barra = DIRECTORY_SEPARATOR;

const classDir = 'lib'.barra.'classes'.barra;

spl_autoload_register(function($className)
{
    if (file_exists(classDir.$className.'.php') === true)
    {
      require_once (classDir.$className.'.php');
    } else
    {
      echo "Classe não encontrada!";
    }
});
?>

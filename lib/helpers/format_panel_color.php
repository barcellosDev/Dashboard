<?php
function format_panel_color() 
{
  if (isset($_GET['status'])) 
  {
    if ($_GET['status'] == 'Ativo') 
    {
      return $color = 'primary';
    }
    elseif ($_GET['status'] == 'Em-andamento') 
    {
      return $color = 'info';

    } elseif ($_GET['status'] == 'Finalizado') 
    {
      return $color = 'success';

    } elseif ($_GET['status'] == 'Parado') 
    {
      return $color = 'danger';
    }
  }
}
?>
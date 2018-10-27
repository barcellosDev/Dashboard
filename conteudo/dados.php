<?php
require_once '../lib/classes/Config.php';
include '../lib/helpers/protect.php';
require_once '../lib/classes/Dump_user.php';
$dump = new Dump_user;
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>
  <body>
    <div style="text-align: center;">
      <div class="table-responsive">
       <table class="table table-hover">
         <thead>
             <tr>
                 <th>ID</th>
                 <th>Número USP</th>
                 <th>Nome</th>
                 <th>E-mail</th>
             </tr>

             <tbody>

               <tr>
                 <td><?php echo $dump->dump('id'); ?></td>
                 <td><?php echo $dump->dump('num_usp'); ?></td>
                 <td><?php echo $dump->dump('nome'); ?></td>
                 <td><?php echo $dump->dump('email'); ?></td>
               </tr>

             </tbody>
         </thead>
       </table>
       </div>
    </div>
    <a class="btn btn-primary" href="<?php echo $_SESSION['pagina']; ?>">Voltar</a>
  </body>
</html>

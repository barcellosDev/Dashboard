<?php
require_once '../lib/classes/Config.php';
include '../lib/helpers/protect.php';
include '../lib/classes/Dump_user.php';
include '../lib/classes/Dump_tables.php';
include '../lib/classes/Dump_os.php';
include '../lib/classes/Dump_detalhes.php';
include '../lib/helpers/format_data.php';
include '../lib/helpers/format_ativo.php';
include '../lib/helpers/format_nome.php';
include '../lib/helpers/format_panel_color.php';

$dump_detalhes = new Dump_detalhes;
$dump_os = new Dump_os;
$dump_user = new Dump_user;
$dump_tables = new Dump_tables;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Detalhes OS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <br>
  <div class="panel panel-default" align="center">
    <div class="panel-body"><h2>&nbsp<i class="fas fa-info"></i>&nbsp&nbspDetalhes do chamado + material</h2></div>
  </div>
  <br>
    <div class="panel panel-<?php echo format_panel_color(); ?>">
      <div class="panel-heading"><i class="fas fa-inbox"></i>&nbsp&nbsp&nbspDetalhes do chamado</div>
      <div class="panel-body">
        <?php
        $dados_detalhes = $dump_detalhes->dump_detalhes();
        $dados_detalhes_usuario = $dump_detalhes->dump_detalhes_usuario($dados_detalhes[0]['id_chamado']);
        $dados_detalhes_material = $dump_detalhes->dump_detalhes_material();
        //Db_config::pre_r($dados_detalhes_material);
        //exit();
        ?>
        <strong>Nº OS:</strong><br>
        <?php echo $dados_detalhes[0]['id_os']; ?>
        <br>
        <br>
        <strong>Data de Abertura:</strong><br>
        <?php echo format_data($dados_detalhes[0]['date']); ?>
        <br>
        <br>
        <strong>Resumo:</strong><br>
        <?php echo $dados_detalhes[0]['resumo']; ?>
        <br>
        <br>
        <strong>Sala:</strong><br>
        <?php echo $dados_detalhes[0]['sala']; ?>
        <br>
        <br>
        <strong>Finalidade:</strong><br>
        <?php echo $dados_detalhes[0]['finalidade']; ?>
        <br>
        <br>
        <strong>Descrição:</strong><br>
        <?php echo $dados_detalhes[0]['descricao']; ?>
        <br>
        <br>
        <strong>Seção (quem abriu o chamado):</strong><br>
        <?php echo format_nome($dados_detalhes[0]['id_chamado']); ?>
        <br>
        <br>
        <strong>E-mail:</strong><br>
        <?php echo $dados_detalhes_usuario[1]['email']; ?>
        <br>
        <br>
        <strong>Status:</strong><br>
        <?php echo format_ativo($dados_detalhes[0]['ativo']); ?>
        <br>
      </div>
   </div>
   <div class="panel panel-<?php echo format_panel_color(); ?>">
      <div class="panel-heading"><i class="far fa-window-maximize"></i>&nbsp&nbsp&nbspDetalhes do material</div>
      <div class="panel-body">
        <strong>Fornecimento:</strong><br>
        <?php echo $dados_detalhes_material[2]['material_fornecimento']; ?>
        <br>
        <br>
        <strong>Descrição:</strong><br>
        <?php echo $dados_detalhes_material[2]['material_descricao']; ?>
        <br>
      </div>
   </div>
   <br>
      <span><a class="btn btn-primary btn-lg" href="<?php echo $_SESSION['pagina']; ?>" role="button">Voltar</a></span>
</div>

</body>
</html>

<?php
require_once '../lib/classes/Config.php';
include '../lib/helpers/protect.php';
include '../lib/classes/Dump_user.php';
include '../lib/classes/Dump_tables.php';
include '../lib/classes/Insert.php';
include '../lib/helpers/hide_form.php';

$dump = new Dump_user;
$dump_tables = new Dump_tables;

$_pag = explode('/', $_SERVER['REQUEST_URI']);

$_SESSION['pagina'] = $_pag[3];
?>
<!DOCTYPE html>
<html lang="pt-br">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Visualizar chamados</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

    <link rel="stylesheet" href="../lib/sisdf_assets/css/sisdf.css">

    <!-- <link href="../lib/sisdf_assets/js/nova_os.js"> -->
  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-light bg-light static-top">

      <a class="navbar-brand mr-1" href="index.php"><img src="../lib/sisdf_assets/img/logo_site.png" width="35">&nbspServiço de atendimento técnico</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="hidden" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">

        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <strong><?php echo $dump->dump('nome'); ?></strong>
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="dados.php"><i class="fas fa-user"></i> Dados do usuário</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt"></i> Logout</a>
          </div>
        </li>
      </ul>
    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Visualizar chamados</span>
          </a>
        </li>

          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            <i class="fas fa-fw fa-chart-area"></i>
            <span>Abrir chamado</span>
          </a>

            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="manutencao_predial.php">Manutenção Predial</a>
            <a class="dropdown-item" href="eletronica.php">Eletrônica</a>
            <a class="dropdown-item" href="mecanica.php">Mecânica</a>
            <a class="dropdown-item" href="informatica.php">Informática</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="meu_chamado.php">
            <i class="fas fa-bars"></i>
            <span>Meus chamados</span>
          </a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">
          <!-- Page Content -->


          <div id="wrapper">
              <div id="page-wrapper">
                  <div class="row">
                      <div class="col-lg-12">
                          <h2 class="page-header">
                          <i class="fas fa-tv"></i> Novo Chamado
                          </h2>
                      </div>
                      <!-- /.col-lg-12 -->
                  </div>

                  <!--Form-->
                  <div class="row">
                      <!-- <div class="alert alert-danger alert-dismissable"></div>-->

                      <div class="col-lg-6">
                          <form role="form" method="post" style="width: 500%;">

                              <input name='id_secao' type="hidden" value="">

                              <div class="form-group">
                                  <label>Resumo:</label>

                                  <input class="form-control" name="resumo" maxlength="100" value="<?php if(isset($_POST['resumo'])) echo $_POST['resumo']; ?>" placeholder="Computador não liga">

                              </div>

                              <!-- LOCAL / SALA -->
                              <div class="form-group">
                                  <label>Local do Atendimento:</label>

                                  <p id="nome_sala" class="label label-success"></p>

                              <?php $dados = $dump_tables->dump_table('nome_sala, num_sala', 'tb_sala'); ?>

                                  <select class="form-control" name="sala" id="sala">
                                      <option value="" selected>Selecione uma sala </option>

                                      <?php
                                        foreach ($dados as $key => $value)
                                        {
                                          echo '<option value=" '.$value['num_sala'].' '.$value['nome_sala'].' ">Sala Nº '.$value['num_sala'].' - '.$value['nome_sala'].' </option>';
                                        }
                                      ?>

                                  </select>
                              </div>

                              <!-- FINALIDADE -->
                              <div class="form-group">
                                  <label>Finalidade</label>

                                  <?php $dados_finalidade = $dump_tables->dump_table('descricao', 'tb_finalidade'); ?>

                                  <select class="form-control" name="finalidade" id="fin">

                                      <option value="" selected>Selecione uma finalidade </option>

                                      <?php
                                        foreach ($dados_finalidade as $key => $value)
                                        {
                                          echo '<option value=" '.$value['descricao'].' ">'.$value['descricao'].'</option>';
                                        }
                                      ?>
                                  </select>

                              </div>



                              <div class="form-group">
                                  <label>Descrição:</label>

                                  <textarea class="form-control" name="descricao" rows="3" placeholder="Placa mãe apresenta problemas; BIOS não inicia etc..." maxlength="200"><?php if(isset($_POST['descricao'])) echo $_POST['descricao']; ?></textarea>
                              </div>

                              <button id="add_material" type="submit" class="btn btn-warning" name="add">
                                  Adicionar Material
                              </button>
                              <!-- Colocar botão de fechar formulário de material para melhor organização -->
                              <?php if (isset($_POST['add'])): ?>

                                <button type="submit" class="btn btn-secondary btn-sm" name="hide">Fechar</button>

                              <?php endif ?>

                              <br>
                              <br>
                              <!-- Se clicar no botão de adicionar material, aparece o formulario do material -->
                              <?php if (isset($_POST['add'])): ?>

                              <!-- Detalhes do Material -->
                              <div id="material" class="panel panel-primary" <?php hide(); ?>  >

                                  <!-- <input id="has_material" name='has_material' type="hidden" value="false"> -->

                                  <div class="panel-heading">
                                      <i class="fa fa-cubes fa-fw"></i>
                                      <strong>Detalhes do Material</strong>
                                  </div>


                                  <div class="panel-body">

                                      <div class="form-group">
                                          <label><strong>Fornecimento do Material:</strong></label>
                                          <select id="forn_material" class="form-control" name="forn_material">
                                              <option value="" selected>Selecione uma opção...</option>
                                              <option value="Departamento">Fornecido pelo Departamento </option>
                                              <option value="Solicitante">Fornecido pelo Solicitante </option>
                                          </select>
                                      </div>

                                      <div class="form-group">
                                          <label><strong>Descrição do material:</strong></label>

                                          <textarea id="desc_material" name="desc_material" class="form-control" rows="3" placeholder="Ex: Nova placa mãe etc..."><?php if(isset($_POST['desc_material'])) echo $_POST['desc_material']; ?></textarea>
                                      </div>
                                  </div>
                              </div>
                            <?php endif ?>

                              <input type="hidden" name="secao" value="Informática">
                              <input type="hidden" name="chamado" value="<?php echo $dump->dump('id'); ?>">
                              <button type="submit" name='abrir_os' class="btn btn-success">Abrir Chamado</button>
                              <button type="reset" class="btn btn-default pull-right">Limpar dados</button>

                          </form>

                      </div>

                  </div>
              </div>
          </div>


          <!-- End page Content -->
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pronto para sair?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Sair</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../lib/helpers/logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

  </body>

</html>
<?php
$insert = new Insert;
include '../lib/helpers/verifyEmpty.php';

if (isset($_POST['abrir_os']))
{
  if (empty($_POST['forn_material']) and empty($_POST['desc_material']))
  {
    $campos[] = verifyEmpty(array('chamado', 'secao', 'resumo', 'sala', 'finalidade', 'descricao'));

    if ($insert->insert_into('tb_os_informatica', $campos[0]) == true)
    {
      echo "<script>window.location.href = 'index.php'</script>";
    } else
    {
      echo "<script>alert('Ocorreu algum erro ao realizar a consulta')</script>";
    }

  } else
  {
    $campos[] = verifyEmpty(array('chamado', 'secao', 'resumo', 'sala', 'finalidade', 'descricao', 'forn_material', 'desc_material'));
    //Db_config::pre_r($campos);
    //exit();

    if ($insert->insert_into('tb_os_informatica', $campos[0]) == true)
    {
      echo "<script>window.location.href = 'index.php'</script>";
    } else
    {
      echo "<script>alert('Ocorreu algum erro ao realizar a consulta')</script>";
    }
  }
}
?>

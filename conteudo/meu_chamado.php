<?php
require_once '../lib/classes/Config.php';
include '../lib/helpers/protect.php';
include '../lib/classes/Dump_user.php';
include '../lib/classes/Dump_tables.php';
include '../lib/classes/Dump_os.php';
include '../lib/helpers/format_data.php';
include '../lib/helpers/format_ativo.php';
include '../lib/helpers/format_acao.php';

$dump_os = new Dump_os;
$dump = new Dump_user;
$dump_tables = new Dump_tables;

/////////////////////////////////////////////
$_pag = explode('/', $_SERVER['REQUEST_URI']);
$_SESSION['pagina'] = $_pag[3];
/////////////////////////////////////////////
//Db_config::pre_r($_SESSION);
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

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-light bg-light static-top">

      <a class="navbar-brand mr-1" href="index.php">Serviço de atendimento técnico</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
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
          <h1><i class="fas fa-bars"></i>&nbsp&nbspMeus chamados</h1>
          <div class="table-responsive">
           <table class="table table-hover">
             <thead>
                 <tr>
                     <th>Nº OS</th>
                     <th>Data de Abertura</th>
                     <th>Resumo</th>
                     <th>Seção</th>
                     <th>Status</th>
                     <th>Ação</th>
                 </tr>

                 <tbody>
                    <?php 
                    $dump_os->meuChamado(); 
                    ?>
                 </tbody>
             </thead>
           </table>
           </div>


          <!-- End page Content -->
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

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
            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-success" href="../lib/helpers/logout.php">Logout</a>
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

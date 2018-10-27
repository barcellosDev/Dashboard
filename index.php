<?php
require_once 'lib/classes/config.php';
require 'lib/autoload.php';
$login = new Login;
$login->Loga();
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SisDF - FFCLRP</title>

        <!-- Bootstrap Core CSS -->
        <link href="lib\bootstrap\css\bootstrap.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="lib\fontawesome\css\fontawesome.css" rel="stylesheet" type="text/css">

        <!-- Custom Fonts -->
        <!--<link href="lib\sisdf_assets\css\sisdf.css?id=10" rel="stylesheet" type="text/css">-->

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="lib\bootstrap\js\bootstrap.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/metismenu"></script>

        <!-- Custom Theme JavaScript -->
        <script src="lib\sisdf_assets\sb-admin-2.js"></script>

        <style media="screen">
          .align-center
          {
            text-align: center;
          }
          .txt-size-25
          {
            font-size: 25px;
          }
        </style>
    </head>
    <body>
      <div class="align-center">
        <img src="lib\sisdf_assets\img\logo_site.png">
        <br>
        <br>
        <p class="txt-size-25"><strong>Serviço de atendimento técnico</strong></p>
      </div>
      <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
          <div id="login-column" class="col-md-6">
              <div class="box">
                  <div class="shape1"></div>
                  <div class="shape2"></div>
                  <div class="shape3"></div>
                  <div class="shape4"></div>
                  <div class="shape5"></div>
                  <div class="shape6"></div>
                  <div class="shape7"></div>
                  <div class="float">

                      <form class="form" action="" method="post">
                          <div class="form-group">
                              <label for="username" class="text-white">Username:</label><br>
                              <input type="text" placeholder="Número USP" name="num_usp" id="username" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="password" class="text-white">Password:</label><br>
                              <input type="password" placeholder="Senha" name="senha" id="password" class="form-control">
                          </div>
                          <div class="form-group">
                              <input type="submit" name="loga" style="width: 100%;" class="btn btn-info btn-md" value="Logar">
                          </div>
                      </form>

                  </div>
              </div>
          </div>
      </div>

</div>
</body>
</html>

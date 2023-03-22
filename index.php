  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/bg_cadastro3.png", {
      speed: 500
    });
  </script>
<?php  include 'config/conexao.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Engenharia de Processo - Multilaser</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" method = "POST" action="/cadastro_sap/cadastro/login.php">
        <h2 class="form-login-heading">Login</h2>
        <div class="login-wrap">
          <input type="text" style="text-transform:uppercase" class="form-control" id = "usuario" name= "usuario" placeholder="Usuário" autofocus>
          <br>
          <input type="password" class="form-control" id = "senha" name = "senha" placeholder="Senha">
          <br>
          <button class="btn btn-theme btn-block" href="index.php" type="submit"><i class="fa fa-lock"></i> ACESSAR</button>
          <hr>
      </form>
    </div>
    <img class="img-robot-automation" src="img/multi_novo_semlogo-removebg-preview.png" alt="Robozinho da automação">
  </div>
</body>
</html>

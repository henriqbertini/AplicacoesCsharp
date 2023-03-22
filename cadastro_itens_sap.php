<!DOCTYPE html>
<html lang="en">
<?php  include 'config/conexao.php'; ?>

<?php

session_start();

@$autenticacao = $_SESSION['login'];
@$nivel = $_SESSION['nivel'];


@$autenticacao = $_SESSION['login'];
@$nivel = $_SESSION['nivel'];

$id = $_GET['ID'];

if($autenticacao != "1")
{
  echo "<script>alert('Ops! Você precisa estar autenticado para acessar esta página.');</script>";
  echo "<script> document.location.href='index.php';</script>"; 
}
else
{
   if($nivel == "CADASTRO" || $nivel == "ADMINISTRADOR")
   {

   }
   else
   {
        echo "<script>alert('Ops! Você não tem permissão para acessa esta página.');</script>";
        echo "<script> document.location.href='index.php';</script>"; 
   }
}


?>

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
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-daterangepicker/daterangepicker.css" />
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



  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header blue-bg">

      <!--logo start-->
      <a href="index.php" class="logo"><b><img src="img/multi2.jpg"></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
       
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">


            <li class="mt">
            <a href="principal.php">
            <i class="fa fa-home"></i>
            <span>Início</span>
            </a>
            </li>

            <li class="sub-menu">
            <a href="cadastro_config_sap.php">
            <i class="fa fa-book"></i>
            <span>Cadastro de Configuração - SAP</span>
            </a>
            </li>            

           
        </ul>
 <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!--
    ***********************************************************************************************************************
        MAIN CONTENT
        ************************************************************************************************************** -->
    <!--main content start-->
			<section id="main-content">
			<section class="wrapper">
			<h3><i class="fa fa-angle-right"></i> Cadastro de Itens - SAP</h3>
			<!-- BASIC FORM ELELEMNTS -->
			<div class="row mt">
			<div class="col-lg-12">
			<div class="form-panel">

        <?php

        $produto = "";

        mysql_select_db('SAP') or die(mysql_error());       
        $query = mysql_query("SELECT *FROM validacao_kit_tela_produto WHERE ID = '$id'");     
              
        while($config = mysql_fetch_array($query))
        {
            $produto = $config['PRODUTO'];
        }

        ?>

				<form class="form-horizontal style-form" method="POST" action = "/cadastro_sap/cadastro/itens_sap.php" >
        
        <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">PRODUTO:</label>
        <div class="col-sm-10">
        <input style="text-transform:uppercase" readonly required type="text" class="form-control"  id = "produto" name = "produto" maxlength="1000" value="<?php echo $produto; ?>" required>
        </div>
        </div>

         <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">ITEM:</label>
        <div class="col-sm-10">
        <input  required type="text" class="form-control"  id = "item" name = "item" maxlength="1000" value="" required>
        </div>
        </div>

         <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">BARCODE:</label>
        <div class="col-sm-10">
        <input style="text-transform:uppercase" required type="text" class="form-control"  id = "barcode" name = "barcode" maxlength="1000" value="" required>
        </div>
        </div>

  <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">Qtd. de Dígito:</label>
        <div class="col-sm-10">
        <input style="text-transform:uppercase" required type="text" class="form-control"  id = "digito" name = "digito" maxlength="1000" value="" required>
        </div>
        </div>

      
								

<!--onclick="return confirm('Deseja cadastrar a configuração?');"-->

                  <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn-theme" type="submit">Salvar</button>
   

                  </div>
                  </div>

                  <h3><i class="fa fa-angle-right"></i> Produtos Cadastrados</h3>

                          <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                  <thead>
                    <tr>


                      <th width="50"style="text-align: center" font-weight:bold; bgcolor="#ADD8E6">STATUS</th>

                      <th width="200"style="text-align: center" font-weight:bold; bgcolor="#ADD8E6">ITEM</th>

                      <th width="100"  style="text-align: center" font-weight:bold; bgcolor="#ADD8E6">BARCODE</th>

                      <th width="50"  style="text-align: center" font-weight:bold; bgcolor="#ADD8E6">QTD. DE DÍGITO</th>

                       <th width="50"  style="text-align: center" font-weight:bold; bgcolor="#ADD8E6">DELETAR</th>


                      </tr>
                  </thead>
                  <tbody>
                    <tr>
              <?php
                mysql_select_db('SAP') or die(mysql_error());

        $query = mysql_query("SELECT *FROM validacao_kit_tela_itens where PRODUTO = '$produto'");     
        
                
        ?>
              <?php while($config = mysql_fetch_array($query)) { ?>
              <tr>

                <td style="text-align: center"><a href="cadastro/atualizar_sap.php?ID=<?php echo $config['ID']; ?>"><img src="<?php if($config['STATUS']== 'HABILITADO') echo 'led_verde.png'; else echo 'led_cinza.png'; ?>" alt="some text" width=23 height=20></td>
                <td style="text-align: center"><span style="text-align: left"><?php echo $config['ITEM'];?></span></td>
                <td style="text-align: center"><?php echo $config['BARCODE']; ?></td>

                <td style="text-align: center"><span style="text-align: left"><?php echo $config['QTD_CARACTERES'];?></span></td>


                <td style="text-align: center"><a href="cadastro/deletar_item_sap.php?ID=<?php echo $config['ID']; ?>">EXCLUIR</a></td>
                
                
  
              </tr>
              <?php } ?>
            </tbody>
                </table>
              </section>

                  </form>
                  </div>


                  </div>
                  <!-- col-lg-12-->
                  </div>
                  <!-- /row -->



    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">


        <p>
    &copy; Copyrights <strong>Multilaser Industrial</strong>. All Rights Reserved
        </p>

        <a href="form_component.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
  <!--custom switch-->
  <script src="lib/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="lib/jquery.tagsinput.js"></script>
  <!--custom checkbox & radio-->
  <script type="text/javascript" src="lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
  <script src="lib/form-component.js"></script>

</body>

</html>

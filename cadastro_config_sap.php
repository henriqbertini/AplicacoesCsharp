<?php  include 'config/conexao.php'; ?>

<?php

session_start();

@$autenticacao = $_SESSION['login'];
@$nivel = $_SESSION['nivel'];


@$autenticacao = $_SESSION['login'];
@$nivel = $_SESSION['nivel'];



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
  <link href="img/multi2.jpg" rel="icon">

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
            <a class="active" href="cadastro_config_sap.php">
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
			<h3><i class="fa fa-angle-right"></i> Cadastro de Configuração - SAP</h3>
			<!-- BASIC FORM ELELEMNTS -->
			<div class="row mt">
			<div class="col-lg-12">
			<div class="form-panel">

        <?php

        mysql_select_db('SAP') or die(mysql_error());
         
          ?>
                       		

<!--onclick="return confirm('Deseja cadastrar a configuração?');"-->

                  <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">      
			      
   

                  </div>
                  </div>
				  <h3><i class="fa fa-angle-right"></i> Cadastrar novo produto</h3>				  
				  <a href="cadastrar_peso.php" class="btn btn-theme">CADASTRAR</a>
                  <h3><i class="fa fa-angle-right"></i> Produtos Cadastrados</h3>

                          <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                  <thead>
                    <tr>

            <th width="140"style="text-align: center" font-weight:bold; bgcolor="#ADD8E6">LINHA</th>
					  
					  <th width="20"  style="text-align: center" font-weight:bold; bgcolor="#ADD8E6">PRODUTO</th>
					  
					  <th width="20"  style="text-align: center" font-weight:bold; bgcolor="#ADD8E6">CODIGO</th>
					  
					  <th width="10"  style="text-align: center" font-weight:bold; bgcolor="#ADD8E6">BALANCA</th>
                
            <th width="20"  style="text-align: center" font-weight:bold; bgcolor="#ADD8E6">PESO MIN</th>
					  
					  <th width="20"  style="text-align: center" font-weight:bold; bgcolor="#ADD8E6">PESO MAX</th>
					  
					  <th width="10"  style="text-align: center" font-weight:bold; bgcolor="#ADD8E6">MAC</th>

            <th width="20"  style="text-align: center" font-weight:bold; bgcolor="#ADD8E6">MANUAL</th>

            <th width="20"  style="text-align: center" font-weight:bold; bgcolor="#ADD8E6">CHAVE</th>
					  
					  <th width="20"  style="text-align: center" font-weight:bold; bgcolor="#ADD8E6">ALTERAR</th>

            <th width="20"  style="text-align: center" font-weight:bold; bgcolor="#ADD8E6">DELETAR</th>

                      </tr>
                  </thead>
                  <tbody>
                    <tr>
              <?php
                mysql_select_db('SAP') or die(mysql_error());

        $query = mysql_query("SELECT *FROM CADASTRO_SAP ORDER BY LINHA");     
        
                
        ?>
              <?php while($config = mysql_fetch_array($query)) { ?>
              <tr>

         <td style="text-align: center"><?php echo $config['LINHA']; ?></td>
				 <td style="text-align: center"><?php echo $config['PRODUTO']; ?></td> 
				 <td style="text-align: center"><?php echo $config['CODIGO']; ?></td> 				
				 <td style="text-align: center"><?php echo $config['BALANCA']; ?></td> 					
				 <td style="text-align: center"><?php echo $config['PESO_MIN']; ?></td> 	
				 <td style="text-align: center"><?php echo $config['PESO_MAX']; ?></td> 	
				 <td style="text-align: center"><?php echo $config['MAC']; ?></td>
         <td style="text-align: center"><?php echo $config['COD_MANUAL']; ?></td> 			
         <td style="text-align: center"><?php echo $config['COD_CHAVE']; ?></td> 								 					 				 
         <td style="text-align: center"><a href="cadastro_peso.php?ID=<?php echo $config['ID']; ?>">CONFIGURAR</a></td>
         <td style="text-align: center"><a href="cadastro/deletar_produto_sap.php?ID=<?php echo $config['ID']; ?>">EXCLUIR</a></td>
                
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

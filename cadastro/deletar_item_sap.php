<?php  
include '../config/conexao.php';

session_start();

@$autenticacao = $_SESSION['login'];
@$nivel = $_SESSION['nivel'];
@$usuario_login = strtoupper($_SESSION['usuario']);


@$autenticacao = $_SESSION['login'];



if($autenticacao != "1")
{
  echo "<script>alert('Ops! Você precisa estar autenticado para acessar esta página.');</script>";
  echo "<script> document.location.href='../index.php';</script>"; 
}
else
{
   if($nivel == "CADASTRO" || $nivel == "ADMINISTRADOR")
   {

   }
   else
   {
        echo "<script>alert('Ops! Você não tem permissão para acessa esta página.');</script>";
        echo "<script> document.location.href='../principal.php';</script>"; 
   }
}

 ?>


<?php 

		
	
	$id = $_GET['ID'];
	$produto = "";

	mysql_select_db('SAP') or die(mysql_error());
	$query = mysql_query("SELECT *FROM validacao_kit_tela_itens WHERE ID ='$id'"); 
                                 
        while($config = mysql_fetch_array($query))
        { 
        	$produto = $config['PRODUTO'];
        	
        }

        $query = mysql_query("SELECT *FROM CADASTRO_SAP WHERE PRODUTO ='$produto'"); 
                                 
        while($config = mysql_fetch_array($query))
        { 
        	$id_produto = $config['ID'];
        	
        }
	
	if($id == "")
	{
 		echo "<script>alert('Ops! dados inválidos.');</script>";
        echo "<script> document.location.href='http://10.1.0.35/cadastro_sap/cadastro_itens_sap.php?ID=$id_produto';</script>"; 
	}
	else
	{
		
		        mysql_select_db('SAP') or die(mysql_error());

		        
				$sql = "DELETE FROM validacao_kit_tela_itens WHERE ID = '$id'";
				$query = mysql_query($sql) or die();

				 if($query)
				 {

				 	echo "<script>alert('Item deletado com sucesso!');</script>";
					 echo "<script> document.location.href='../cadastro_itens_sap.php?ID=$id_produto';</script>";  
				 }
				 else
				 {
					 echo "<script>alert('Não foi possível realizar a exclusão do registro!');</script>";
					 echo "<script> document.location.href='../cadastro_itens_sap.php?ID=$id_produto';</script>"; 
				 }	

	}
	
	
	
?>
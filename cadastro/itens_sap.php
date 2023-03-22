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

		
	
	$produto = $_POST['produto'];
	$item = $_POST['item'];
	$barcode = $_POST['barcode'];
	$digito = $_POST['digito'];
	$id_produto="";
	$iditem = "";

	$produto_banco = "";

	if($produto == "" || $item == "" || $barcode == "" || $digito == "")
	{
 		echo "<script>alert('Ops! dados inválidos.');</script>";
        echo "<script> document.location.href='http://10.1.0.35/cadastro_sap/cadastro_config_sap.php';</script>"; 
	}
	else
	{
	
		mysql_select_db('SAP') or die(mysql_error());

		$query = mysql_query("SELECT *FROM validacao_kit_tela_itens WHERE PRODUTO ='$produto' AND ITEM = '$item' "); 
                                 
        while($config = mysql_fetch_array($query))
        { 
        	$produto_banco = $config['PRODUTO'];
        	$iditem = $config['ID'];
        	
        }

		$query = mysql_query("SELECT *FROM CADASTRO_SAP WHERE PRODUTO ='$produto'"); 

                                 
        while($config = mysql_fetch_array($query))
        { 
        	$id_produto = $config['ID'];
        	
        }

		
		if($produto_banco == "")
		{

			$produto_item = "";

			$query = mysql_query("SELECT *FROM validacao_kit_tela_itens WHERE BARCODE ='$barcode' AND BARCODE <> 'SEQUENCIAL' "); 
                                 
       	 while($config = mysql_fetch_array($query))
         { 
        	$produto_item = $config['PRODUTO'];
        	
         }

         if($produto_item == ""){

			$produto_uppercase = strtoupper($produto);

			 $sql = "INSERT INTO validacao_kit_tela_itens (PRODUTO,ITEM,BARCODE,STATUS,QTD_CARACTERES) VALUES ('$produto_uppercase','$item','$barcode','HABILITADO','$digito')";
				$query = mysql_query($sql) or die();

				if($query)
				 {
				 	 echo "<script>alert('Item cadastrado com sucesso para o produto $produto_uppercase!');</script>";
					 echo "<script> document.location.href='../cadastro_itens_sap.php?ID=$id_produto';</script>"; 
				 }
				 else
				 {
				 	 echo "<script>alert('Não foi possível realizar o cadastro!');</script>";
					 echo "<script> document.location.href='../cadastro_itens_sap.php?ID=$id_produto';</script>"; 
				 }
			}
			else
			{
				echo "<script>alert('Este BARCODE já está cadastrado em outro item!');</script>";
					 echo "<script> document.location.href='../cadastro_itens_sap.php?ID=$id_produto';</script>"; 
			}


		}
				 		
		else
	    {

				mysql_select_db('SAP') or die(mysql_error());
		       $sql = "UPDATE validacao_kit_tela_itens SET ITEM = '$item', BARCODE = '$barcode', QTD_CARACTERES = '$digito'  WHERE ID ='$iditem'"; 

                       $query = mysql_query($sql) or die();          
       
               if($query){
       


					 echo "<script>alert('Item atualizado com sucesso!');</script>";
					 echo "<script> document.location.href='../cadastro_itens_sap.php?ID=$id_produto';</script>"; 

					}
					else
					{
							 echo "<script>alert('Não foi possível realizar o cadastro!');</script>";
					 echo "<script> document.location.href='../cadastro_itens_sap.php?ID=$id_produto';</script>"; 
					}

	    
	    }

	}
	
	
	
?>
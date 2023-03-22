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

		
	$linha = strtoupper($_POST['linha']);
	$produto = strtoupper($_POST['produto']);
	$codigo = strtoupper($_POST['codigo']);
	$balanca = strtoupper($_POST['balanca']);
	$peso_min = strtoupper($_POST['PESO_MIN']);
	$peso_max = strtoupper($_POST['PESO_MAX']);	
	$mac = strtoupper($_POST['mac']);	
	$manual = strtoupper($_POST['COD_MANUAL']);
	$chave = strtoupper($_POST['COD_CHAVE']);
	$ID = "";
	$cnt = "";
	

	mysql_select_db('SAP') or die(mysql_error());
	
	$query = mysql_query("SELECT *FROM CADASTRO_SAP WHERE LINHA ='$linha' AND PRODUTO ='$produto'"); 
        
		while($config = mysql_fetch_array($query))
        { 
        	$ID = $config['ID'];
        	
        }
		$cnt = mysql_num_rows($query);     
			
		echo "$cnt Rows\n";
		echo "$linha\n";
		echo "$produto\n";
		echo "$codigo\n";
		echo "$balanca\n";
		echo "$peso_min\n";
		echo "$peso_max\n";
		echo "$mac\n";
		echo "$manual\n";
		echo "$chave\r\n";
		
	if($cnt == "0")
	{
		echo "PASSOU AQUI\n";
		mysql_select_db('SAP') or die(mysql_error());
		
		$insert_query = "INSERT INTO CADASTRO_SAP (LINHA ,PRODUTO ,CODIGO ,BALANCA ,PESO_MIN ,PESO_MAX ,MAC, COD_MANUAL, COD_CHAVE) VALUES ('$linha','$produto','$codigo','$balanca','$peso_min','$peso_max','$mac', '$manual', '$chave');";
		
		echo "$insert_query";
		
 		$query2 = mysql_query($insert_query) or die();          
				
			echo "SQL Query to execute: $query2\n"; # Debug Message

            if($query2)
			{
				echo "<script>alert('Produto cadastrado com sucesso!');</script>";
				echo "<script> document.location.href='../cadastrar_peso.php?ID=$ID';</script>"; 
			}
			else
			{
				 echo "<script>alert('Não foi possível realizar o cadastro!');</script>";
				echo "<script> document.location.href='../cadastrar_peso.php?ID=$ID';</script>"; 
			}
 	}
	else
	{
		echo "<script>alert('Verifique se não está cadastrando um produto já existente!');</script>";       
            
	}
	
	
	
?>
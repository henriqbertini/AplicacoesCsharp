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

	$id_produto="";

	$produto_banco = "";



	if($produto == "")
	{
 		echo "<script>alert('Ops! dados inválidos.');</script>";
        echo "<script> document.location.href='http://10.1.0.35/cadastro_sap/cadastro_config_sap.php';</script>"; 
	}
	else
	{
	
		mysql_select_db('SAP') or die(mysql_error());

		$query = mysql_query("SELECT *FROM CADASTRO_SAP WHERE PRODUTO ='$produto'"); 
                                 
        while($config = mysql_fetch_array($query))
        { 
        	$produto_banco = $config['PRODUTO'];
        	
        }

      
		
		if($produto_banco == "")
		{
			$produto_uppercase = strtoupper($produto);

			 $sql = "INSERT INTO CADASTRO_SAP (PRODUTO) VALUES ('$produto_uppercase')";
				$query = mysql_query($sql) or die();

				if($query)
				 {
				 	 echo "<script>alert('Produto cadastrado com sucesso!');</script>";
					 echo "<script> document.location.href='../cadastro_config_sap.php';</script>"; 
				 }
				 else
				 {
				 	 echo "<script>alert('Não foi possível realizar o cadastro!');</script>";
					 echo "<script> document.location.href='../cadastro_config_sap.php';</script>"; 
				 }

		}
				 		
		else
	    {

			 echo "<script>alert('Desculpe mas este produto já foi cadastrado!');</script>";
					 echo "<script> document.location.href='../cadastro_config_sap.php';</script>"; 

	    
	    }

	}
	
	
	
?>
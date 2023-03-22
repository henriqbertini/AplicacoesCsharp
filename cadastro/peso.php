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

		
	$linha = $_POST['linha'];
	$produto = $_POST['produto'];
	$codigo = $_POST['codigo'];
	$balanca = $_POST['balanca'];
	$peso_min = $_POST['PESO_MIN'];
	$peso_max = $_POST['PESO_MAX'];	
	$mac = $_POST['mac'];	
	$manual = $_POST['COD_MANUAL'];
	$chave = $_POST['COD_CHAVE'];
	$ID = "";

	mysql_select_db('SAP') or die(mysql_error());
	
	$query = mysql_query("SELECT *FROM CADASTRO_SAP WHERE LINHA ='$linha' AND PRODUTO ='$produto'"); 
                                 
        while($config = mysql_fetch_array($query))
        { 
        	$ID = $config['ID'];
        	
        }

	//if($linha == "" || $produto == "" || $codigo == "" || $balanca == "" || $peso_min == "" || $peso_max == "" || $mac == "" )
	if($linha == "")
	{
 		echo "<script>alert('Ops! dados inválidos ou configuração de peso incorreta.');</script>";
         echo "<script> document.location.href='../cadastro_peso.php?ID=$ID';</script>";
 	}
	else
	{
	
				
		    //    $sql = "UPDATE CADASTRO_SAP SET PESO_MIN = '$peso_min', PESO_MAX = '$peso_max' WHERE LINHA ='$linha' AND PRODUTO ='$produto'"; 
			   $sql = "UPDATE CADASTRO_SAP SET CODIGO = '$codigo', BALANCA = '$balanca', PESO_MIN = '$peso_min', PESO_MAX = '$peso_max', MAC = '$mac', COD_MANUAL = '$manual', COD_CHAVE = '$chave' WHERE PRODUTO ='$produto'";
 


              $query = mysql_query($sql) or die();          
       
               if($query){
       


					 echo "<script>alert('Peso atualizado com sucesso!');</script>";
					 echo "<script> document.location.href='../cadastro_peso.php?ID=$ID';</script>"; 

					}
					else
					{
							 echo "<script>alert('Não foi possível realizar o cadastro!');</script>";
					 echo "<script> document.location.href='../cadastro_peso.php?ID=$ID';</script>"; 
					}

	    
	    
	}
	
	
	
?>
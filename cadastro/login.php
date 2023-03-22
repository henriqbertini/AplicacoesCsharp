<?php  include '../config/conexao.php'; ?>


<?php 

	session_start();

	$usuario = $_POST["usuario"];
	$senha = $_POST["senha"];
	
	$_SESSION["usuario"] = $usuario;

	mysql_select_db('SAP') or die(mysql_error());

	$query = mysql_query("SELECT *FROM USUARIOS WHERE USUARIO = '$usuario' and SENHA ='$senha'"); 

        $nivel = "";
                                 
        while($seleciona_nivel = mysql_fetch_array($query))
        { 
                                    
              $nivel = $seleciona_nivel['NIVEL'];                         

        }     
	
	$verifica = mysql_query("SELECT * FROM USUARIOS WHERE USUARIO = '$usuario' and SENHA ='$senha'") or die(mysql_error());
    
    if(mysql_num_rows($verifica) <= 0)
	 {
		echo "<script>alert('Login e/ou senha incorretos');</script>";
		echo "<script> document.location.href='../index.php';</script>";  
		
		$_SESSION["login"]="0";
		$_SESSION["nivel"] = "";

		 }
	 		else
			 {
				setcookie("login",$login);
				$_SESSION["login"]="1";
				$_SESSION["usuario"]=$usuario;
				$_SESSION["nivel"] = $nivel;

		 		header ("location:../principal.php");
			 }
	

?>
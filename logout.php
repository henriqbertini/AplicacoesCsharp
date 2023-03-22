<?php

@session_start();
@session_destroy();
@$_SESSION['login'] = "0";
@$_SESSION['nivel'] = "";

echo "<script> document.location.href='index.php';</script>"; 

?>
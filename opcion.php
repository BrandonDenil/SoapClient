<?php
session_start();
$_SESSION['cui']=$_POST['cui'];
$_SESSION['cantidad']=$_POST['cantidad'];
if($_POST['opcion']=="verificar"){
    header("Location: verificarPago.php ");
  }
  elseif($_POST['opcion']=="pagar"){
    header("Location: realizarPago.php ");
  }

?>

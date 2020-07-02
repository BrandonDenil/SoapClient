<?php
  include './client.php';
  session_start();
  $data = array('dpi'=>$_SESSION['cui'],'anio'=>"2020");
  $respuesta=  $client->verPartida($data);
  if($respuesta!="false"){
    $_SESSION['resultado']="verificado";
    echo "verificado";
  }
  elseif($respuesta=="false"){
      $_SESSION['resultado']="no verificado";
      echo "no verificado";
  }
  
  header("Location: index.php ");

?>
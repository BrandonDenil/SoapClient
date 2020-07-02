<?php
    include './client.php';
    session_start();
    $data = array('dpi'=>$_SESSION['cui'],'anio'=>'2020');
    $respuesta=  $client->verBoleta($data);
    if($respuesta!="false"){
      $_SESSION['resultado']="sin error";
      $data = array('persona'=>$_SESSION['id'],'cantidad'=>$_SESSION['cantidad']);
      $respuesta=  $client->pago($data);
        if($respuesta=="pago realizado"){
            session_start();
            $_SESSION['resultado']="pago realizado";
            header("Location: index.php ");
        }
    }
    elseif($respuesta=="false"){
        $_SESSION['resultado']="error";
      header("Location: index.php ");
    }


 
    echo 'error al procesar la transacción <a href="index.php">regresar<a>';

  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!-- Compiled and minified JavaScript -->

  <style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    input[type=number] {
      -moz-appearance: textfield;
    }

    .card {
      margin-top: 2em;
      padding-top: 1em;
      padding-bottom: 1em;
    }
  </style>
</head>

<body>
  <nav>
    <div class="nav-wrapper  blue-grey darken-4">
      <a href="#" class="brand-logo center">Sistema de pagos de partidas </a>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
      </ul>
    </div>
  </nav>

  <div class="row">
    <div class="col l8 offset-l2">
      <div class="card">
        <form action="opcion.php" name="log" method="post">
          <div class="row">
            <div class="input-field col l3 offset-l1">
              <input placeholder="" id="cui" name="cui" type="text" class="validate" pattern="[0-9]{13}" title="ingrese correctamente un cui">
              <label for="first_name">Ingrese Cui</label>
            </div>
            <div class="input-field col l3 ">
              <input placeholder="" id="cui" name="cantidad" type="number" class="validate">
              <label for="first_name">Ingrese cantidad a pagar</label>
            </div>
            <div class="input-field col l2 ">
              <p>
                <label>
                  <input name="opcion" value="verificar" type="radio" checked />
                  <span>Verificar pago</span>
                </label>
              </p>
              <p>
                <label>
                  <input name="opcion" value="pagar" type="radio" />
                  <span>Realizar pago</span>
                </label>
              </p>

            </div>
            <div class="input-field col l2 ">
              <button class="btn  blue-grey darken-4">Continuar </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
  session_start();
  if (isset($_SESSION['resultado'])) {
    if ($_SESSION['resultado'] == "error") {
      echo ' <input type="text" style="display: none;" id="res" value="activado">';
    } elseif ($_SESSION['resultado'] == "pago realizado") {
      echo ' <input type="text" style="display: none;" id="res" value="pago realizado">';
    } elseif ($_SESSION['resultado'] == "verificado") {
      echo ' <input type="text" style="display: none;" id="res" value="verificado">';
    } elseif ($_SESSION['resultado'] == "no verificado") {
      echo ' <input type="text" style="display: none;" id="res" value="no verificado">';
    } else {
      $_SESSION['resultado'] = "sin error";
      echo ' <input type="text" style="display: none;" id="res" value="desactivado">';
    }
    $_SESSION['resultado'] = "sin error";
  } else {
    $_SESSION['resultado'] = "sin error";
    echo ' <input type="text" style="display: none;" id="res" value="desactivado">';
  }
  ?>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script type='text/javascript'>
    M.AutoInit();

    if ($("#res").val() == "activado") {
      M.toast({
        html: 'No ha cancelado el boleto de ornato'
      })
    } else if ($("#res").val() == "pago realizado") {
      M.toast({
        html: 'pago ingresado!'
      })
    } else if ($("#res").val() == "verificado") {
      M.toast({
        html: 'Partida de nacimiento  cancelada'
      })
    } else if ($("#res").val() == "no verificado") {
      M.toast({
        html: 'Partida no cancelada'
      })
    }
  </script>
</body>

</html>
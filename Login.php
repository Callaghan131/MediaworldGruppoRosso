<?php
  session_start();
  if(isset($_SESSION['connessione']))
  {
    header('Location: Tabella.php');
  }
?>
<!DOCTYPE html>
  <!--[if IE 8]><html class="no-js lt-ie9" lang="it" ><![endif]-->
  <!--[if gt IE 8]><!--><html class="no-js" lang="it" ><!--<![endif]-->
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title>Login utenti</title>

      <link href="bootstrap/bootstrap.min.css" rel="stylesheet" media="screen">
      <script src="js/modernizr-custom.js"></script>

      <link href="css/Login/Login.css" rel="stylesheet" media="screen">
      <!-- respond.js per IE8 -->
      <!--[if lt IE 9]>
      <script src="js/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>
      <!-- Titolo pagina -->
      <div class="row">
        <header class="col-sm-4 col-sm-offset-4 text-center">
          <h1>LOGIN</h1>
        </header>
      </div>

      <form name="login" method="POST" action="php/Login/Login.php">
        <!-- Label e textbox del nome utente -->
        <div class="row">
          <div class="col-sm-4 col-sm-offset-4 form-group ">
            <label class="nav-justified">Nome utente
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Es. Gianmarco Forchetta" title="Inserisci il tuo nome utente" autofocus required>
            </label>
          </div>
        </div>

        <!-- Label e textbox della password -->
        <div class="row">
          <div class="col-sm-4 col-sm-offset-4 form-group">
            <label class="nav-justified">Password
            <input type="password" class="form-control" id="password" name="password" placeholder="Es. 123" title="Inserisci la tua password" required>
            </label>
          </div>
        </div>

        <!-- Bottone per effettuare login -->
        <div class="row">
          <div class="col-sm-4 col-sm-offset-4">
            <input type="submit" class="btn btn-primary" value="Invia" title="Effettua il login">
          </div>
        </div>

        <!-- Bottone per resettare la form -->
        <div class="row">
          <div class="col-sm-4 col-sm-offset-4">
            <input type="reset" class="btn btn-danger" value="Reset" title="Resetta la form">
          </div>
        </div>

        <input type="hidden" name="bot" value=" ">

      </form>
    </body>
  </html>

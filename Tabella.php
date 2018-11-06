<?php
  session_start();
  if(!isset($_SESSION['connessione']))
  {
    header('Location: Login.php');
  }
?>

<!DOCTYPE html>
  <!--[if IE 8]><html class="no-js lt-ie9" lang="it" ><![endif]-->
  <!--[if gt IE 8]><!--><html lang="it" class="no-js"><!--<![endif]-->
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title>Modifica record</title>

      <link href="bootstrap/bootstrap.min.css" rel="stylesheet" media="screen">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="js/modernizr-custom.js"></script>
      <link href="css/Tabella/Tabella.css" rel="stylesheet" media="screen">
      <!-- respond.js per IE8 -->
      <!--[if lt IE 9]>
      <script src="js/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>
      <?php
        include('php/Tabella/pop_up.php');
      ?>
      <div class="row bottoni">
        <!-- Bottone per creare nuovo utente -->
        <div class="col-xs-2 col-sm-2">
          <button type="button" class="btn" id="crea" data-toggle="modal" data-target="#flipFlop" title="Aggiungi un nuovo utente"></button>
        </div>

        <!-- Inizio del pop-up -->
        <div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

              <!-- Header del pop-up -->
              <div class="modal-header">
                <!-- Bottone chiusura pop-up -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">
                    &times;
                  </span>
                </button>

                <!-- Titolo pop-up -->
                <h4 class="modal-title" id="modalLabel">
                  Registra utente
                </h4>
              </div>

              <!-- Form del pop-up -->
              <form name="aggiungi" method="post" action="php/Tabella/Aggiungi.php" id="finestra">
                <!-- body del pop-up -->
                <div class="modal-body">

                  <!-- campi dinamici del pop-up + terndina selezione del sesso -->
                  <?php
                    $parametri = array_fill(0, 7, null);
                    echo TestBlockHTML($parametri);
                  ?>
                  <label class="row comparsa">
                    <span class="col-xs-12 col-sm-4">
                      Sesso
                    </span>
                    <span class="col-xs-12 col-sm-4">
                      <select name="sesso" class="form-control" id="sesso">
                        <option value="maschio" selected>maschio</option>
                        <option value="femmina">femmina</option>
                        <option value="altro">altro</option>
                      </select>
                    </span>
                  </label>

                  <!-- footer del pop-up con i 3 relativi bottoni -->
                  <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="registra" value="Registra">
                    <input type="reset" class="btn btn-danger" name="reset" value="Resetta form">
                    <button type="button" class="btn btn-success" data-dismiss="modal" title="Chiudi il pop-up">Chiudi</button>
                  </div>

                </div>
              </form>

            </div>
          </div>
        </div>

        <!-- Bottone per eliminare un campo -->
        <div class="col-xs-2 col-sm-2">
          <input type="submit" form="elimina" class="btn" name="elimina" value="-" id="cestino" title="Elimina un utente selezionato">
        </div>

        <!-- Bottone per modificare un campo -->
        <div class="col-xs-2 col-sm-2">
          <input type="submit" form="elimina" class="btn" name="elimina" value="[]" id="matita" title="Modifica un utente selezionato">
        </div>

        <div class="col-xs-2 col-sm-2 col-xs-offset-4 col-sm-offset-4">
          <a href="php/Tabella/Logout.php" class="btn pull-right" id="logout" title="Effettua il logout"></a>
        </div>
      </div>

      <!-- Tabella contenimento dati -->
      <form id="elimina" action="php/Tabella/Elimina.php" method="post">
        <div class="row" id="tabella">
          <table class="table col-xs-5 col-sm-5">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Età</th>
                <th scope="col">Sesso</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <!-- Creazione paginatore e stampa tabella -->
            <?php
              include_once "php/Tabella/Paginatore.php";
            ?>
          </table>
        </div>
      </form>

      <!-- creazione dinamica del numero di tasti del paginatore -->
      <footer>
        <?php
          for ($pagina=1;  $pagina<=$num_di_pag; $pagina++)
          {
            echo'<a  href="Tabella.php?page='.$pagina.'" class="btn btn-success" title="Vai alla pagina '. $pagina.'">'.$pagina.'</a>';
          }
        ?>
      </footer>

    </body>
  </html>

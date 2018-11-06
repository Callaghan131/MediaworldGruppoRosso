<?php
  if($_POST['elimina'] == "-")
  {
    elimina();
  }
  elseif($_POST['elimina'] == "[]")
  {
    modifica();
  }

function elimina()
{
include('Connessione.php');

  if($_POST['radio']!=null)
  {
    $id = $_POST['radio'];
    $parametri = explode(',', $id);
    $sql = 'DELETE FROM tblanagrafica WHERE idAnagrafica = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $parametri[0], PDO::PARAM_STR);
    $stmt->execute();
    header('Location: ../../Tabella.php');
  }
  else
  {
    header('Location: ../../Tabella.php');
  }
}


function modifica()
{
include('Connessione.php');
include('pop_up.php');
  if($_POST['radio']!=null)
  {
    $id = $_POST['radio'];
    $parametri = explode(',', $id);

    echo '
    <!DOCTYPE html>
    <!--[if IE 8]><html class="no-js lt-ie9" lang="it" ><![endif]-->
    <!--[if gt IE 8]><!--><html lang="it" class="no-js"><!--<![endif]-->
      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Modifica record</title>
        <link href="../../bootstrap/bootstrap.min.css" rel="stylesheet" media="screen">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="../../css/Tabella/Tabella.css" rel="stylesheet" media="screen">
        <script src="../../js/modernizr-custom.js"></script>
        <!-- respond.js per IE8 -->
        <!--[if lt IE 9]>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        </head>
      <body>
     <!-- The modal -->

     <h4 class="modal-title" id="modalLabel">Modifica utente</h4>
     <form name="aggiungi" method="post" action="Modifica.php">
       <div class="modal-body">
         <label class="row comparsa"><span class="col-xs-12 col-sm-4">ID</span>
          <span class="col-xs-12 col-sm-4"><input type="text" class="form-control" name="id" value='.$parametri[0].' readonly></span>
         </label>'.
          TestBlockHTML($parametri)
          .'
          <label class="row comparsa"><span class="col-xs-12 col-sm-4">Sesso</span>
            <span class="col-xs-12 col-sm-4"><select class="form-control" name="sesso">';
              if($parametri[6]=="maschio" || $parametri[6]==null || $parametri[6]=="")
              {
                echo' <option value="maschio" selected>maschio</option>
                <option value="femmina">femmina</option>
                 <option value="altro">altro</option>';
              }
              if($parametri[6]==="femmina")
              {
                echo '<option value="maschio">maschio</option>
                <option value="femmina" selected>femmina</option>
                 <option value="altro">altro</option>';
              }
              if($parametri[6]==="altro")
              {
                echo '<option value="maschio">maschio</option>
                <option value="femmina">femmina</option>
                 <option value="altro" selected>altro</option>';
              }
            echo '
           </select></span>
          </label>
          <label>
            <input type="hidden" name="psw_invisibile" value='.$parametri[4].'>
          </label>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary" name="registra" value="Registra">
            <input type="reset" class="btn btn-danger" name="reset" value="Resetta form">
            <a href="../../Tabella.php" class="btn btn-success">Chiudi</a>
          </div>
        </div>
      </form>
      </html>
    ';
  }
  else
  {
    header('Location: ../../Tabella.php');
  }
}
?>

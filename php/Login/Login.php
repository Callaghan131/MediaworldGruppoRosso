<?php
  //Prova di connessione al database
  try
  {
    $hostname = "127.0.0.1:3306";
    $dbname = "mediaworldgrupporosso";
    $user = "root";
    $pass = "";
    $db = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass, array(PDO::ATTR_PERSISTENT => true));
  }
  //In caso di errore di connessione
  catch (PDOException $e)
  {
    echo "Errore: " . $e->getMessage();
    die();
  }

  //Acquisizione nome e password
  $nome =$_POST['nome'];
  $password =md5($_POST['password']);
  $bot = $_POST['bot'];

  if($bot != " ")
  {
    header('Location: ../../Login.php');
    die();
  }
  else
  {
    //Controllo nel database se esiste l'utente
    $sql = 'SELECT Username, password FROM tblanagrafica WHERE Username like "%":nome"%" AND password like "%":password"%"';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    $totale = $stmt->rowCount(); //Se totale è uguale a 1 ha trovato la riga con le informazioni del login

    //Accesso a pagina della tabella e salvataggio dei dati del login
    if($stmt->rowCount()==1)
    {
      session_start();
      $_SESSION["connessione"]=true;
      Include_once("Salvadati_login.php");
      header('Location: ../../Tabella.php');
    }
    //Reindirizzamento alla pagina di login
    else
    {
      header('Location: ../../Login.php');
      die();
    }
  }
?>

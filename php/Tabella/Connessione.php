<?php
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
?>

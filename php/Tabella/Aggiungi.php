<?php
  include('Connessione.php');

  $nome = $_POST['nome'];
  $cognome= $_POST['cognome'];
  $username= $_POST['username'];
  $password= md5($_POST['password']);
  $eta= $_POST['eta'];
  $sesso= $_POST['sesso'];

  $sql = "INSERT INTO tblanagrafica(Nome, Cognome, Username, password, Etautenti, sesso) VALUES(:nome, :cognome,:username, :password, :etautenti, :sesso)";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
  $stmt->bindParam(':cognome', $cognome, PDO::PARAM_STR);
  $stmt->bindParam(':username', $username, PDO::PARAM_STR);
  $stmt->bindParam(':password', $password, PDO::PARAM_STR);
  $stmt->bindParam(':etautenti', $eta, PDO::PARAM_STR);
  $stmt->bindParam(':sesso', $sesso, PDO::PARAM_STR);
  $stmt->execute();
  header('Location: ../../Tabella.php');
?>

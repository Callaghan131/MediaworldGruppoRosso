<?php
  include('Connessione.php');

  $nome = $_POST['nome'];//
  $cognome= $_POST['cognome'];//
  $username= $_POST['username'];//
  $password=$_POST['password'];
  $eta= $_POST['eta'];
  $sesso= $_POST['sesso'];
  $id = $_POST['id'];
  $attuale = $_POST['psw_invisibile'];

  $nome = filter_var($nome, FILTER_CALLBACK, array('options' => 'my_filter'));
  $cognome = filter_var($cognome, FILTER_CALLBACK, array('options' => 'my_filter'));
  sanitizzausername($username);
  sanitizzaeta($eta);
    $sql = 'UPDATE tblanagrafica SET Nome = :nome, Cognome = :cognome, Username = :username, password = :password, Etautenti = :etautenti, sesso = :sesso WHERE idAnagrafica =:id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':cognome', $cognome, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);

    if($password==$attuale)
    {
      $stmt->bindValue(':password', $attuale, PDO::PARAM_STR);
    }
    else
    {
      $stmt->bindValue(':password', md5($password), PDO::PARAM_STR);
    }
    $stmt->bindParam(':etautenti', $eta, PDO::PARAM_STR);
    $stmt->bindParam(':sesso', $sesso, PDO::PARAM_STR);
    $stmt->execute();
    header('Location: ../../Tabella.php');
  function my_filter($value)
  {
      return preg_replace('/[^a-z\d_]/iu', '', $value);

  }
  function sanitizzausername($username)
  {
      $username = filter_var($username, FILTER_SANITIZE_URL);
  }
  function sanitizzaeta($eta)
  {
    $eta=filter_var($eta,FILTER_SANITIZE_FLOAT );
  }
?>

<?php
  //Acquisizione indirizzo ip e data
  $indirizzoIP=$_SERVER['REMOTE_ADDR'];
  $data = date("Ymd");
  function sanitizzaindirizzoIP($indirizzoIP) {
    $indirizzoIP = filter_var($indirizzoIP, FILTER_SANITIZE_URL);
}
sanitizzaindirizzoIP($indirizzoIP);
if(filter_var($indirizzoIP, FILTER_VALIDATE_IP))
{
  //Inserimento dei dati nel database
  $sql = "INSERT INTO tbllogaccessi(username, indirizzoIP, data) VALUES(:nome, :indirizzoIP, :data)";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
  $stmt->bindParam(':indirizzoIP', $indirizzoIP, PDO::PARAM_STR);
  $stmt->bindParam(':data', $data, PDO::PARAM_STR);
  $stmt->execute();
}
else
{
  header('Location: ../../Login.php');
  die();
}
?>

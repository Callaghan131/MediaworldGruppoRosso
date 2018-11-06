<?php
  //######CONNESSIONE DATABASE######//
  include('Connessione.php');

  //#########QUANTI RISULTATI PE RPAGINA#########//
  $ris_per_pag = 10;

  //####RISULTATI DEL DATABASE#######//
  $sql = $db -> prepare('SELECT * FROM tblanagrafica');
  $sql -> execute();
  $righe = $sql -> rowCount();

  //########NUMERO DI PAGINE########//
  $num_di_pag = ceil($righe/$ris_per_pag);

  //########DETERMINARE SU QUALE PèAGINA è IL VISITATORE#########//
  if (!isset($_GET['page']))
  {
    $pagina = 1;
  }
  else
  {
    $pagina = $_GET['page'];
  }

  //#######DETERMINARE LIMIT DELL'SQL######//
  $questa_prima_pagina_risultato = ($pagina-1)*$ris_per_pag;

  //#######RECUPERARE IL RISULTATO SELEZIONATO E MOSTRARLO A VIDEO########//
  $sql = $db -> prepare('SELECT * FROM tblanagrafica LIMIT ' . $questa_prima_pagina_risultato .','. $ris_per_pag);
  $sql->bindParam(':primo', $questa_prima_pagina_risultato, PDO::PARAM_INT);
  $sql->bindParam(':secondo', $ris_per_pag, PDO::PARAM_INT);
  $sql -> execute();

  //Stampa della tabella e creazione del relativo form con cui poter eliminare o modificare in seuito una riga
  while ($row = $sql -> fetch(PDO::FETCH_ASSOC))
  {
    echo
    ' <tr>
        <td>'.$row["idAnagrafica"].'</td>
        <td>'.$row["Nome"].'</td>
        <td>'.$row["Cognome"].'</td>
        <td>'.$row["Username"].'</td>
        <td>'.$row["password"].'</td>
        <td>'.$row["Etautenti"].'</td>
        <td>'.$row["sesso"].'</td>
        <td><input type="radio" name="radio" value='.$row['idAnagrafica'].",".$row['Nome'].",".$row['Cognome'].",".$row['Username'].",".$row['password'].",".$row['Etautenti'].",".$row['sesso'].'></td>
      </tr>'
    ;
  }
?>

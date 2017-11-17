<?php
  //Ouvre une connexion à un serveur MySQL
  $host='127.0.0.1'; $user='root'; $passwd="0000"; $dbname="dwm8";
  $link = mysqli_connect($host, $user, $passwd, $dbname);

  //Exécute une requête sur la base de données
  $query = "SELECT * FROM `animals`";
  $result = mysqli_query($link, $query);

  // Lit une ligne de résultat MySQL dans un tableau associatif
  $array = mysqli_fetch_assoc($result);
  echo '[' . $array["id"] . ']' . $array["race"] . '<br>';

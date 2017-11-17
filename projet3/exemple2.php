<?php
  //Ouvre une connexion à un serveur MySQL
  $host='127.0.0.1'; $user='root'; $passwd="0000"; $dbname="dwm8";
  $link = mysqli_connect($host, $user, $passwd, $dbname);

  //Information renseigné par l'utilisateur
  $email= "ferey@gmail.com";
  $passwd= md5("0000");

  //Création de la query
  $query = "SELECT `id` FROM `users`
            WHERE `email` = '$email' AND `password` = '$passwd'
            LIMIT 1;";

  //Envoie de la query à mysql
  $result = mysqli_query($link, $query);

  //Transfert des données dans un tableau associatif
  // par rapport aux colonnes de la query
  $array = mysqli_fetch_assoc($result);
  mysqli_close($link);

  //Stockage en SESSION
  session_start();
  $_SESSION['user'] = $array['id'];


  var_dump('Identifiant utilisateur :', $_SESSION['user']);

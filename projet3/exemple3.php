<?php
//Ouvre une connexion à un serveur MySQL
$host='127.0.0.1'; $user='root'; $passwd="0000"; $dbname="dwm8";
$link = mysqli_connect($host, $user, $passwd, $dbname);

//Information renseigné par l'utilisateur
$email= "ferey@gmail.com";
$passwd= md5("0000");

//Création de la query
$query = "INSERT INTO `users` (`id`, `email`, `password`)
          VALUES (NULL, '$email', '$passwd')";

//Envoie de la query à mysql
$result = mysqli_query($link, $query);

if($result == true) {
  echo "Inscription réussi<br>";
  //Retourne l'identifiant automatiquement généré
  //par la dernière requête
  $id = mysqli_insert_id($link);
  echo "Enregistrement effectué à l'identifiant : " . $id;
}

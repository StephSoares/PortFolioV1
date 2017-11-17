<?php

//Ouvre une connexion à un serveur MySQL
$host='127.0.0.1'; $user='root'; $passwd="0000"; $dbname="dwm8";
$link = mysqli_connect($host, $user, $passwd, $dbname);

//Information renseigné par l'utilisateur
$id = '5';

//Création de la query
$query = "SELECT `id`, `email`
          FROM `users`
          WHERE `id` = '$id'
          LIMIT 1;";

//Envoie de la query à MySQL
$result = mysqli_query($link, $query);



//Récupération des résultats
$array = mysqli_fetch_assoc($result);

echo "#" . $array['id'] . "User : " . $array['email'] . "<br>";

//Donnée utilisateur modifié POST
$email = 'test@gmail.com';

$query = "UPDATE `users` SET `email` = ? WHERE `id` = ?";

//Crée une requête préparée
$stmt = mysqli_prepare($link, $query);

//Liaison des marqueurs avec les variables
mysqli_stmt_bind_param($stmt, "si", $email, $id);


//Exécution de la requête
mysqli_stmt_execute($stmt);

if($result == true) {
  echo "Mise à jour réussie";
}

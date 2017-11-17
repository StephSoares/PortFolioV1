<?php

$dsn = "mysql:dbname=dwm8;host=127.0.0.1;charset=UTF8";
$username = "root";
$password = "0000";
$pdo = new PDO($dsn, $username, $password);

// http://projet3.dev/pdo/exemple5.php?id=21
//Information renseigné par l'utilisateur GET
$id = $_GET['id'];

//Création de la query
$query = "SELECT `id`, `email`
          FROM `users`
          WHERE `id` = '$id'
          LIMIT 1;";

//Envoie de la query à MySQL
$result = $pdo->query($query);

//Récupération des résultats
$array = $result->fetch();

echo "#" . $array['id'] . "Users : " . $array['email'] . "<br>";

// Donnée utilisateur modifié POST
$email = 'test@gmail.com';

$query = "UPDATE `users` SET `email` = ? WHERE `id` = ?";

$sth = $pdo->prepare($query);
$sth->bindParam(1, $email, PDO::PARAM_STR, 255);
$sth->bindParam(2, $id, PDO::PARAM_INT);
$result = $sth->execute();

if($result == true) {
  echo "Mise à jour réussie";
}

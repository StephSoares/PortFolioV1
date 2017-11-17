<?php
//Ouvre une connexion à un serveur MySQL dans l'objet PDO
$dsn = "mysql:dbname=dwm8;host=127.0.0.1;charset=UTF8";
$pdo = new PDO($dsn, "root", "0000");

//Information renseigné par l'utilisateur, formulaire de connexion
$email= "ferey@gmail.com";
$passwd= md5("0000");

//Création de la query
$query = "SELECT `id` FROM `users`
          WHERE `email` = '$email' AND `password` = '$passwd'
          LIMIT 1;";

//Envoie de la query à mysql
$result = $pdo->query($query);

//Transfert des données dans un tableau associatif
// par rapport aux colonnes de la query
$array = $result->fetch();

//Stockage en SESSION
session_start();
$_SESSION['user'] = $array['id'];


var_dump('Identifiant utilisateur :', $_SESSION['user']);

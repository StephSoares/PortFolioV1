<?php

$dsn = "mysql:dbname=dwm8;host=127.0.0.1;charset=UTF8";
$username = "root";
$password = "0000";
$pdo = new PDO($dsn, $username, $password);

//Création de la query
$query= "SELECT `id`, `email`, `password` FROM `users`;";

//Envoie de la query à mysql
$results = $pdo->query($query);

foreach ($results as $row) {
  echo "#" . $row['id'] . " email:" . $row['email'] . " ";
  echo "Hash : " . $row['password'] . "<br>";
}

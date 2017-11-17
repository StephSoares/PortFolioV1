<?php

//Ouvre une connexion à un serveur MySQL
$host='127.0.0.1'; $user='root'; $passwd="0000"; $dbname="dwm8";
$link = mysqli_connect($host, $user, $passwd, $dbname);

//Information renseigné par l'utilisateur POST
$where = 'gmail';
$_where = '%' . $where . '%';

//Création de la query
$query= "SELECT * FROM `users`
         WHERE `email` LIKE ?;";

 //Crée une requête préparée
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, "s", $_where);
$result = mysqli_stmt_execute($stmt);

//Association des variables de résultats
mysqli_stmt_bind_result($stmt, $id, $email, $password);

//Lecture des valeurs
mysqli_stmt_fetch($stmt);

echo "#" . $id . "email : " . $email;

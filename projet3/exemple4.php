<?php
//Ouvre une connexion à un serveur MySQL
$host='127.0.0.1'; $user='root'; $passwd="0000"; $dbname="dwm8";
$link = mysqli_connect($host, $user, $passwd, $dbname);

//Création de la query
$query= "SELECT `id`, `email`, `password` FROM `users`;";

//Envoie de la query à mysql
$result = mysqli_query($link, $query);

$rows = [];
$numsRows = mysqli_num_rows($result);
for ($i=0; $i < $numsRows; $i++) {
  //array_push($rows, mysqli_fetch_assoc($result));
  $rows[] = mysqli_fetch_assoc($result);
}

foreach ($rows as $row) {
  echo "#" . $row['id'] . " Email : " . $row['email'] . " ";
  echo "Mot de passe : " . $row['password'] . "<br>";
}

//mysqli_fetch_all
//mysqli_fetch_assoc

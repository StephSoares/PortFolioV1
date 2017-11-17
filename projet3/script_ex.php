<?php
$dsn = "mysql:dbname=dwm8;host=127.0.0.1;charset=UTF8";
$username = "root";
$password = "0000";
$pdo = new PDO($dsn, $username, $password);

//Création de la query
$query= "SELECT `id`, `email`, `birthday` FROM `users` ORDER BY `birthday` DESC LIMIT 10;";

//Envoie de la query à mysql
$results = $pdo->query($query);


foreach ($results as $row) {
  echo "<tr class='table-info'>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "<td>" . $row['birthday'] . "</td>";
  echo "</tr>";

}

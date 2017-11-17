----- exemple 1 ----- //Exemple classique
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

?>
----- exemple 2 ----- //Exemple de connexion
<?php
//Ouvre une connexion à un serveur MySQL
$host='127.0.0.1'; $user='root'; $passwd="0000"; $dbname="dwm8";
$link = mysqli_connect($host, $user, $passwd, $dbname);

//Information renseigné par l'utilisateur
$email= "stephane.ferey@gmail.com";
$passwd= md5("0000");

//Création de la query
$query = "SELECT `id` FROM `users`
          WHERE `email` = $email AND `password` = $passwd
          LIMIT 1;";

//Envoie de la query à mysql
$result = mysqli_query($link, $query);

//Transfert des données dans un tableau associatif
// par rapport aux colonnes de la query
$array = mysqli_fetch_assoc($result);

//Stockage en SESSION
session_start();
$_SESSION['user'] = $array['id'];


var_dump('Identifiant utilisateur :', $_SESSION['user']);

?>
---- exemple 3 ---- //Inscription en BDD d'un utilisateur
<?php
//Ouvre une connexion à un serveur MySQL
$host='127.0.0.1'; $user='root'; $passwd="0000"; $dbname="dwm8";
$link = mysqli_connect($host, $user, $passwd, $dbname);

//Information renseigné par l'utilisateur
$email= "stephane.ferey@gmail.com";
$passwd= md5("0000");

//Création de la query
$query = "INSERT INTO `users` (`id`, `email`, `password`)
          VALUES (NULL, $email, $passwd)";

//Envoie de la query à mysql
$result = mysqli_query($link, $query);
if($result == true) {
  echo "Inscription réussi";
  //Retourne l'identifiant automatiquement généré par la dernière requête
  $id = mysquli_insert_id();
  echo "Enregistrement effectué à l'identifiant : " . $id;
}

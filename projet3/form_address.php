<?php
 session_start();
 require_once 'validate_address.php';
 require_once 'db.php';
 if(isset($_POST['submit'])) {
   $errors = validateAddress();
   if (count($errors) == 0) {
     $data['ville'] = strtolower($_POST['ville']);
     $data['user_id'] = $_SESSION['user']['id'];
     $result = insertAddress($data);
     if ($result != false) {
       echo "<h3 style='color:white;font-size:20px;'>Vous avez rempli votre Adresse.</h3>";
     }
   }
 }
 ?>
 <head>
   <link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,700" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Revalia" rel="stylesheet">
   <link rel="stylesheet" href="./style.css">
 </head>

<form class="container_educ" action="" method="POST">
  <h1>Adresse : </h1>
  <hr width="25%" color="#01882E">
  <br>
  <br>
  <div class="container_div">
  <label for="ville">Adresse : </label>
  <textarea id="ville" type="textarea" name="ville" placeholder="ex : 10 rue Jean Jaurès 69000 Lyon"></textarea>
  </div>
  <br>
  <input class="enter" name="submit" type="submit" value="Entrez">
</form>
<br>
<div class="container_log">
  <a class="liens" href="./index.php">Retour</a>
</div>

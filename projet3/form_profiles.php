<?php
 session_start();
 require_once 'validate_profiles.php';
 require_once 'db.php';
 if(isset($_POST['submit'])) {
   $errors = validateProfiles();
   if (count($errors) == 0) {
     $data['avatar'] = strtolower($_POST['avatar']);
     $data['bio'] = strtolower($_POST['bio']);
     $data['permis'] = strtolower($_POST['permis']);
     $data['check_car'] = strtolower($_POST['check_car']);
     $data['user_id'] = $_SESSION['user']['id'];
     $result = insertProfiles($data);
     if ($result != false) {
       echo "<h3 style='color:white;font-size:20px;'>Vous avez rempli votre profile.</h3>";
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
  <h1>Profile : </h1>
  <hr width="25%" color="#01882E">
  <br>
  <br>
  <div class="container_div">
  <label for="avatar">Image de profile : </label>
  <input id="avatar" type="text" name="avatar" placeholder="ex :/image/avatar.png">
  </div>
  <br>
  <div class="container_div">
  <label for="bio">Votre présentation : </label>
  <textarea id="bio" type="textarea" name="bio" maxlength="400px;" placeholder="Décrivez vous en quelques mots ..."></textarea>
  </div>
  <br>
  <div class="container_div">
  <label for="permis">Permis : </label>
  <label for="permis">Avez-vous le permis ? : </label>
  <input id="permis" type="text" name="permis">
  </div>
  <br>
  <div class="container_div">
  <label for="check_car">Êtes-vous véhiculer ? : </label>
  <input id="check_car" type="text" name="check_car">
  </div>
  <br>
  <input class="enter" name="submit" type="submit" value="Entrez">
</form>
<br>
<div class="container_log">
  <a class="liens" href="./index.php">Retour</a>
</div>

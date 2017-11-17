<?php
 session_start();
 require_once 'validate_experiences.php';
 require_once 'db.php';
 if(isset($_POST['submit'])) {
   $errors = validateExperiences();
   if (count($errors) == 0) {
     $data['date_begin'] = strtolower($_POST['date_begin']);
     $data['date_ended'] = strtolower($_POST['date_ended']);
     $data['title'] = strtolower($_POST['title']);
     $data['description'] = strtolower($_POST['description']);
     $data['user_id'] = $_SESSION['user']['id'];
     $result = insertExperiences($data);
     if ($result != false) {
       echo "<h3 style='color:white;font-size:20px;'>Vous avez rempli votre formation (Vous pouvez refaire le formulaire pour pouvoir mettre plusieurs formations).</h3>";
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
  <h1>Expériences Professionnelles : </h1>
  <hr width="25%" color="#01882E">
  <br>
  <br>
  <div class="container_div">
  <label for="date_begin">Date de début : </label>
  <input id="date_begin" type="date" name="date_begin" placeholder="ex : 00/00/0000">
  </div>
  <br>
  <div class="container_div">
  <label for="date_ended">Date de fin : </label>
  <input id="date_ended" type="date" name="date_ended" placeholder="ex : 00/00/0000">
  </div>
  <br>
  <div class="container_div">
  <label for="title">Titre du poste : </label>
  <input id="title" type="text" name="title" placeholder="Indiquez le titre du poste occuper à cette période">
  </div>
  <br>
  <div class="container_div">
  <label for="description">Déscription du poste : </label>
  <textarea id="description" type="textarea" name="description" maxlength="500px;" placeholder="Décrivez le poste occuper à cette période."></textarea>
  </div>
  <br>
  <input class="enter" name="submit" type="submit">
</form>
<br>
<div class="container_log">
  <a class="liens" href="./index.php">Retour</a>
</div>

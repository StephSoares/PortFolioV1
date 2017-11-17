<?php
 session_start();
 require_once 'validate_educations.php';
 require_once 'db.php';
 if(isset($_POST['submit'])) {
   $errors = validateEducations();
   if (count($errors) == 0) {
     $data['date_begin'] = strtolower($_POST['date_begin']);
     $data['date_ended'] = strtolower($_POST['date_ended']);
     $data['title'] = strtolower($_POST['title']);
     $data['description'] = strtolower($_POST['description']);
     $data['user_id'] = $_SESSION['user']['id'];
     $result = insertEducations($data);
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
  <h1>Formations : </h1>
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
  <label for="title">Diplôme obtenu : </label>
  <input id="title" type="text" name="title" placeholder="Mettez le nom de votre diplôme">
  </div>
  <br>
  <div class="container_div">
  <label for="description">Etablissement scolaire : </label>
  <textarea id="description" type="textarea" name="description" maxlength="500px;" placeholder="Indiquez le nom de l'établissement ou vous avez eu votre diplôme et son adresse."></textarea>
  </div>
  <br>
  <input class="enter" name="submit" type="submit" value="Entrez">
</form>
<br>
<div class="container_log">
  <a class="liens" href="./index.php">Retour</a>
</div>

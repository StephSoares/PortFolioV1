<?php
 session_start();
 require_once 'validate_skills.php';
 require_once 'db.php';
 if(isset($_POST['submit'])) {
   $errors = validateSkills();
   if (count($errors) == 0) {
     $data['label'] = strtolower($_POST['label']);
     $data['level'] = strtolower($_POST['level']);
     $data['user_id'] = $_SESSION['user']['id'];
     $result = insertSkills($data);
     if ($result != false) {
       echo "<h3 style='color:white;font-size:20px;'>Vous avez rempli vos compétences.</h3>";
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
  <h1>Compétences : </h1>
  <hr width="25%" color="#01882E">
  <br>
  <br>
  <div class="container_div">
  <label for="label">Compétences informatiques : </label>
  <input id="label" type="text" name="label" placeholder="ex : HTML, CSS, JS, PHP ...">
  </div>
  <br>
  <div class="container_div">
  <label for="level">A combien estimez-vous avoir eu cette compétence ? : </label>
  <label><input id="level" type="number" name="level" step="1" min="0" max="100" placeholder="de 0 à 100">  %</label>
  </div>
  <br>
  <input class="enter" name="submit" type="submit" value="Entrez">
</form>
<br>
<div class="container_log">
  <a class="liens" href="./index.php">Retour</a>
</div>

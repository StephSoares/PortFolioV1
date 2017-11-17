<?php
 require_once 'validate_register.php';
 require_once 'db.php';
 if(isset($_POST['submit'])) {
   $errors = validateRegister();
   if (count($errors) == 0) {
     $data['firstname'] = strtolower($_POST['firstname']);
     $data['lastname'] = strtolower($_POST['lastname']);
     $data['password'] = cryptThis($_POST['password']);
     $data['email'] = strtolower($_POST['email']);


     $result = insertUser($data);
     if ($result != false) {
       header("refresh:5;url=index.php");
       echo "Bienvenu, vous allez être redirigé quand quelques secondes ... Merci de votre patience.";
     }
   }
 }
 ?>

<head>
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Revalia" rel="stylesheet">
  <link rel="stylesheet" href="./style.css">
</head>
<body>

  <div class="container_menu">
    <h2 class="title_menu">INSCRIPTIONS</h2>
    <hr width="25%" color="#01882E;">
  </div>
<div class="container">
  <form class="container1 vh_form" action="" method="POST">
      <div class="containt">
        <label for="firstname">Prénom : </label>
        <input id="firstname" type="text" value='<?= (isset($_POST['firstname']))? $_POST['firstname'] : "" ?>' name="firstname" placeholder="Tapez votre prénom">
      </div>
      <?php
        if(isset($errors['firstname'])){
          echo $errors ['firstname'];
        }
      ?>
      <br>
      <div class="containt">
        <label for="lastname">Nom : </label>
        <input id="lastname" type="text" value='<?= (isset($_POST['lastname']))? $_POST['lastname'] : "" ?>' name="lastname" placeholder="Tapez votre nom">
      </div>
      <?php
        if(isset($errors['lastname'])){
          echo $errors ['lastname'];
        }
      ?>
      <br>
      <div class="containt">
        <label for="email">Email : </label>
        <input id="email" type="email" value='<?= (isset($_POST["email"]))? $_POST["email"]: ""?>' name="email"  placeholder="exemple@exemple.com">
      </div>
      <?php //if(isset($errors['email'])){ echo $errors['email']; }?>
      <?= (isset($errors['email']))? $errors['email'] . "" : "" ?>
      <br>
      <div class="containt">
        <label for="password">Mot de passe : </label>
        <input id="password" type="password" name="password" placeholder="Tapez votre mot de passe">
      </div>
      <?php
        if (isset($errors['password'])) {
          echo "<ul style='font-size: 13px; color:red; list-style:none; text-align:center;'>";
            foreach ($errors['password'] as $key => $value) {
              echo "<li class='$key'>$value</li>";
            }
          echo "</ul>";
        }
      ?>
      <br>
      <div class="containt">
        <label for="repassword">Mot de passe : </label>
        <input id="repassword" type="password" name="repassword" placeholder="Retapez votre mot de passe">
      </div>
      <?php
        if(isset($errors['repassword'])){
          echo $errors ['repassword'];
        }
      ?>
      <br>
      <div class="containt">
       <input class="enter" type="submit" name="submit">
     </div>
  </form>
</div>
</body>

<?php

function validateProfiles() {
  $errors = [];
  $error = validateRequired($_POST['avatar']);
  if ($error) {
    $errors['avatar'] = $error;
  }
  $error = validateRequired($_POST['bio']);
  if ($error) {
    $errors['bio'] = $error;
  }
  $error = validateRequired($_POST['permis']);
  if ($error) {
    $errors['permis'] = $error;
  }
  $error = validateRequired($_POST['check_car']);
  if ($error) {
    $errors['check_car'] = $error;
  }

  return $errors;
}
/**
  * Vérifie l'existance du contenue de la chaine de caractère
  * @return array | void
*/
 function validateRequired($str) {
   if (empty($str)) {
     return "<div style='color:red;'>Elément obligatoire à remplir.</div>";
   }
 }

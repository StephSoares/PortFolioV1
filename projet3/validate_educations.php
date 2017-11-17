<?php

function validateEducations() {
  $errors = [];
  $error = validateRequired($_POST['date_begin']);
  if ($error) {
    $errors['date_begin'] = $error;
  }
  $error = validateRequired($_POST['date_ended']);
  if ($error) {
    $errors['date_ended'] = $error;
  }
  $error = validateRequired($_POST['title']);
  if ($error) {
    $errors['title'] = $error;
  }
  $error = validateRequired($_POST['description']);
  if ($error) {
    $errors['description'] = $error;
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

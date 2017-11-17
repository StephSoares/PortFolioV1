<?php

function validateSkills() {
  $errors = [];
  $error = validateRequired($_POST['label']);
  if ($error) {
    $errors['label'] = $error;
  }
  $error = validateRequired($_POST['level']);
  if ($error) {
    $errors['level'] = $error;
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

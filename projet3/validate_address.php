<?php

function validateAddress() {
  $errors = [];
  $error = validateRequired($_POST['ville']);
  if ($error) {
    $errors['ville'] = $error;
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

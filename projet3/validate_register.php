<?php
/**
  * Vérifie la validité du formlaire
  * @return array | void
*/
function validateRegister() {
  $errors = [];
  $error = validateRequired($_POST['firstname']);
  if ($error) {
    $errors['firstname'] = $error;
  }
  $error = validateRequired($_POST['lastname']);
  if ($error) {
    $errors['lastname'] = $error;
  }
  $error = validateEmail($_POST['email']);
  if ($error) {
    $errors['email'] = $error;
  }
  $error = validatePassword($_POST['password']);
  if ($error) {
    $errors['password'] = $error;
  }
  $error = validateIdentical($_POST['password'], $_POST['repassword']);
  if ($error) {
    $errors['repassword'] = $error;
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

/**
  * Vérifie la validité d'un mot de passe
  * @var $password Mot de passe à valider
  * @return array | void
*/
function validatePassword($password) {
  $errors = array();

  if(strlen($password) < 5){
    $errors['invalidLenght'] = "Mot de passe trop court.";
  }
  if(!preg_match('/[[:digit:]]/', $password)) {
    $errors['invalidDigit'] = "Le mot de passe ne contient pas de numéros.";
  }
  if(!preg_match('/[a-zA-Z]/', $password)) {
    $errors['invalidAlpha'] = "Le mot de passe ne contient pas de lettres.";
  }
  if(strtolower($password) == $password) {
    $errors['invalidUpper'] = "Le mot de passe ne contient pas de Majuscules.";
  }
  $specialAllow = ["&", "@", "#", "[", "]", "*", "%"];
  if(str_replace($specialAllow, "_", $password) == $password) {
    $errors['invalidSpecial'] = "Le mot de passe ne contient pas de caractères spéciaux tel que ".join($specialAllow);
  }
  if (!empty($errors)) {
    return $errors;
  }
}

/**
  * Vérifie la validité d'un email
  * @var $email Email à valider
  * @return array | void
*/
function validateEmail($email){
  $errors = array();

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return "<div style='color:red;'>Email invalide.</div>";
  }
  /*
  //Autre version d'écriture ...
  if (empty($errors)) {
    $errors = true;
  }
    return $errors;

  if (empty($errors)) {
    return true;
  } else {
    return $errors;
  }*/
}
/**
  * Vérifie l'identicité de 2 paramètres
  * @var $str2 string à comparer
  * @var $str2 string à comparer
  * @return string | void
*/
function validateIdentical($str1, $str2){
  if ($str1 !== $str2) {
    return "<div style='color:red;'>Le mot de passe n'est pas identique.</div>";
  }
}

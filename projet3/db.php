<?php

function connect(){
  $link = mysqli_connect('localhost', 'root', '0000', 'dwm8', 3306);
  return $link;
}

function checkLogin($email, $password) {
  $email = clean($email);
  $password = cryptThis($password);

  $link = connect();
  $result = mysqli_query($link,
    "SELECT `id` FROM `users`
     WHERE `email` = '$email'
     AND `password` = '$password'
     LIMIT 1;"
    );

  if(!$result) {
    var_dump('Aucun résultats');
  } else {
    $fetch = mysqli_fetch_assoc($result);
    return $fetch;
  }
}

function cryptThis($var){
  $salt = 'cryptemoila';
  return md5($var. $salt);
}

function clean($var){
  #return filter_var($var, "full_special_chars");
  return htmlspecialchars($var);
}
function insertUser(array $data){
  if (!is_array($data)) {
    echo "Cette fonction doit recevoir un array";
    exit;
  }

  $link = connect();
  $email = $data['email'];
  $password = $data['password'];
  $sql = "INSERT INTO `users` (`id`, `email`, `password`)
    VALUES (NULL, '$email', '$password');";

    $result = mysqli_query($link, $sql);
    return $result;
}
function insertProfiles(array $data){
  if (!is_array($data)) {
    echo "Cette fonction doit recevoir un array";
    exit;
  }

  $link = connect();
  $avatar = $data['avatar'];
  $bio = $data['bio'];
  $permis = $data['permis'];
  $check_car = $data['check_car'];
  $user_id = $data['user_id'];
  $sql = "INSERT INTO `Profiles` (`id`, `user_id`, `avatar`, `bio`, `permis`, `check_car`)
    VALUES (NULL, $user_id, '$avatar', '$bio', '$permis', '$check_car');";
    $result = mysqli_query($link, $sql);
    return $result;
}
function insertAddress(array $data){
  if (!is_array($data)) {
    echo "Cette fonction doit recevoir un array";
    exit;
  }

  $link = connect();
  $ville = $data['ville'];
  $user_id = $data['user_id'];
  $sql = "INSERT INTO `Address` (`id`, `user_id`, `ville`)
    VALUES (NULL, '$user_id', '$ville');";

    $result = mysqli_query($link, $sql);
    return $result;
}
function insertEducations(array $data){
  if (!is_array($data)) {
    echo "Cette fonction doit recevoir un array";
    exit;
  }

  $link = connect();
  $date_begin = $data['date_begin'];
  $date_ended = $data['date_ended'];
  $title = $data['title'];
  $description = $data['description'];
  $user_id = $data['user_id'];
  $sql = "INSERT INTO `Educations` (`id`, `user_id`, `date_begin`, `date_ended`, `title`, `description`)
    VALUES (NULL, '$user_id','$date_begin', '$date_ended', '$title', '$description');";

    $result = mysqli_query($link, $sql);
    return $result;
}
function insertExperiences(array $data){
  if (!is_array($data)) {
    echo "Cette fonction doit recevoir un array";
    exit;
  }

  $link = connect();
  $date_begin = $data['date_begin'];
  $date_ended = $data['date_ended'];
  $title = $data['title'];
  $description = $data['description'];
  $user_id = $data['user_id'];
  $sql = "INSERT INTO `Experiences` (`id`, `user_id`, `date_begin`, `date_ended`, `title`, `description`)
    VALUES (NULL, '$user_id','$date_begin', '$date_ended', '$title', '$description');";

    $result = mysqli_query($link, $sql);
    return $result;
}
function insertSkills(array $data){
  if (!is_array($data)) {
    echo "Cette fonction doit recevoir un array";
    exit;
  }

  $link = connect();
  $level = $data['level'];
  $label = $data['label'];
  $user_id = $data['user_id'];
  $sql = "INSERT INTO `Skills` (`id`, `user_id`, `level`, `label`)
    VALUES (NULL, '$user_id','$level', '$label');";

    $result = mysqli_query($link, $sql);
    return $result;
}
#pour voir si l'élement qu'on reçoit est un tableau
/* fuction insertUser($data){
  if (!is_array($data)) {
  echo "Cette fonction doit recevoir un array";
  exit;
}
}*/

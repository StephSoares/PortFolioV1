<?php
  session_start();
  require_once 'db.php';
  if(!empty($_POST) && isset($_POST['submit'])){
    if(isset($_POST['email']) && !empty($_POST['email'])){
      $email = $_POST['email'];
      if(isset($_POST['password']) && !empty($_POST['password'])){
        $password = $_POST['password'];
        $result = checkLogin($email, $password);
        $_SESSION['user'] = $result;
        header('Location: index.php');
      }
    }
  }

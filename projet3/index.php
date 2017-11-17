<head>
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Revalia" rel="stylesheet">
  <link rel="stylesheet" href="./style.css">
</head>
<?php
  session_start();
  if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    require_once 'admin.php';
  } else {
    require_once 'form_login.php';
  }

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Excerice</title>
  <link rel="stylesheet" href="/style_ex.css">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
</head>
<body>
  <div class="flex-container">
    <header>
      TABLEAU : DATE DE NAISSANCE
    </header>
    <hr width="55%" color="black">
    <table class="table table-striped table-hover table-bordered">
      <thead class="thead-dark">
        <tr>
          <th>#id</th>
          <th>Email</th>
          <th>Date d'anniversaire</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require_once 'script_ex.php';
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>

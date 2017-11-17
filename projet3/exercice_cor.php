<?php
  function db(){
    $dsn="mysql:dbname=dwm8;host=127.0.0.1;charset=UTF8";
    $username="root"; $passwd="0000";
    $pdo = new PDO($dsn, $username, $passwd);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
  }
  function listes($currentPage) {
    $pdo = db();
    $offset = ($currentPage -1) *3;

    $query = "SELECT `id`, `email`, `birthday`
              FROM `users`
              ORDER BY `birthday` DESC LIMIT 3 OFFSET $offset;";

    $result = $pdo->query($query);
    return $result;
  }
  //Compter le nombre de pages à gérer
  function countPages(){
    $pdo = db();
    //$result = $pdo->query("SELECT * FROM `users`;");
    //var_dump($result->rowCount());
    $result = $pdo->query("SELECT COUNT(*) FROM `users`;");
    $count= $result->fetchColumn();
    $numsPage = ceil($count / 3);
    return $numsPage;
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/bootstrap.css">
  </head>
  <body>
    <div class="container">
      <div>
        <ul class="pagination">
          <?php
          $pages = countPages();
          for ($i = 1; $i <= $pages; $i++) {
            if(!isset($_GET['selectPage']) || empty($_GET['selectPage'])) {
              $currentPage = 1;
            } else { $currentPage = $_GET['selectPage']; }
            $classLi='page-item';
            if($currentPage == $i){
              $classLi .= ' active';
            }
            echo "<li class='$classLi'>";
              echo '<a class="page-link" href="?selectPage='.$i.'">'.$i.'</a>';
            echo '</li>';
          }?>
          </ul>
      </div>
      <table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>Email</th>
            <th>Birthday</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $listes = listes($currentPage);
            foreach ($listes as $row):?>
              <tr>
                <?php foreach ($row as $data) {
                  echo "<td> $data </td>";
                }?>
              </tr>
          <?php endforeach;?>
        </tbody>
      </table>

    </div>
  </body>
</html>

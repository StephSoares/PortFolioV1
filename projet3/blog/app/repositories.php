<?php

  /**
   * Récupére l'objet PDORow
   * @return PDO
   */
  function getPDO(){
    $dsn = "mysql:dbname=blog;host=127.0.0.1;charset=UTF8";
    $username = "root";
    $password = "0000";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
  }

  /**
   *  Récupére un article depuis son ID
   *  @param $id int
   *  @return void | array
   */
  function getArticle($id) {
    $pdo = getPDO();
    $query = "SELECT * FROM `articles` WHERE `idarticles` = ?;";
    $prepare = $pdo->prepare($query);
    $prepare->bindParam(1, $id, PDO::PARAM_INT);
    $result = $prepare->execute();
    if($result == true){
      return $prepare->fetch();
    }
  }
  function getAuthor($id) {
    $pdo = getPDO();
    $query = "SELECT `firstname`, `lastname` FROM `users` WHERE `idusers` = ?; ";
    $prepare = $pdo->prepare($query);
    $prepare->bindParam(1, $id, PDO::PARAM_INT);
    $result = $prepare->execute();
    if($result == true){
      return $prepare->fetch();
    }
  }

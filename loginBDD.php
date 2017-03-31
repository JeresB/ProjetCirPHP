<?php
$myDsn = "mysql:host=localhost;port=3306;dbname=pdo;charset=utf8;";
$myDbLogin = "pdo";
$myDbPwd = "phpmyadmin";

try {
  $pdo = new PDO($myDsn, $myDbLogin, $myDbPwd);
} catch (PDOException $e) {
  echo 'Connexion échouée : '.$e->getMessage();
}

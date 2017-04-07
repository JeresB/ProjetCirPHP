<?php
// Connexion à la base de données
// HOST : localhost
// PORT : 3306
// NOM : pdo
// CHARSET : utf8
// LOGIN : pdo
// MOT DE PASSE : phpmyadmin
$myDsn = "mysql:host=localhost;port=3306;dbname=pdo;charset=utf8;";
$myDbLogin = "pdo";
$myDbPwd = "phpmyadmin";

// Création de l'objet PDO
try {
  $pdo = new PDO($myDsn, $myDbLogin, $myDbPwd);
} catch (PDOException $e) {
  echo 'Connexion échouée : '.$e->getMessage();
}

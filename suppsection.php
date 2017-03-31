<?php
  include 'loginBDD.php';

  $requete = "DELETE FROM section WHERE `section` = :section";
  $section = htmlspecialchars($_POST["section"]);

  $query = $pdo->prepare($requete);
  $query->bindParam(":section", $section, PDO::PARAM_STR, 15);
  $query->execute();

  header('Location: section.php');

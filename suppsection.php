<?php
  // Inclusion de la connexion à la BDD
  include 'loginBDD.php';

  // Requete de suppression de la section
  $requete = "DELETE FROM section WHERE `section` = :section";
  // On recupère le nom de la section à supprimer
  $section = htmlspecialchars($_POST["section"]);

  // Préparation et execution de la suppression
  $query = $pdo->prepare($requete);
  $query->bindParam(":section", $section, PDO::PARAM_STR, 15);
  $query->execute();

  // Redirection vers la liste des sections
  header('Location: section.php');

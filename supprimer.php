<?php
  include 'loginBDD.php'; // On se connecte à la base de données

  // On sécurise les données nom et prenom
  $nom = htmlspecialchars($_POST["nom"]);
  $prenom = htmlspecialchars($_POST["prenom"]);

  // On crée la requete de suppression
  $requete = "DELETE FROM etudiant WHERE nom = :nom AND prenom = :prenom";
  $query = $pdo->prepare($requete); // On prepare la requete
  // On lie les variables nom et prenom à la requete
  $query->bindParam(":nom", $nom, PDO::PARAM_STR, 20);
  $query->bindParam(":prenom", $prenom, PDO::PARAM_STR, 20);
  $query->execute(); // On execute la requete

  // Redirection vers la liste des étudiants
  header('Location: etudiants.php');

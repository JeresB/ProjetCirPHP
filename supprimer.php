<?php
  include 'loginBDD.php';

  $query = $pdo->prepare("DELETE FROM etudiant WHERE `nom` = '".$_POST["nom"]."' AND `prenom` = '".$_POST["prenom"]."'");
  $query->execute();

  header('Location: etudiants.php');

<?php

  include 'loginBDD.php';
  include 'header.php';

  echo "<div class='container'>
        <div class='page-header'>
          <h1>Détail de l'étudiant <small>Back office</small></h1>
        </div>";

  $query = $pdo->prepare("SELECT * FROM etudiant WHERE `nom` = '".$_POST['nom']."' AND `prenom` = '".$_POST['prenom']."'");
  $query->execute();
  $row = $query->fetch();

  echo  "<strong>Mail :</strong> ".$row["mail"]."<br>
        <strong>Nom :</strong> ".$row["nom"]."<br>
        <strong>Prenom :</strong> ".$row["prenom"]."<br>
        <strong>Date de naissance :</strong> ".$row["date_naissance"]."<br>
        <strong>Section :</strong> ".$row["section"]."<br><br>";

  echo "<a href = 'etudiants.php' class='btn btn-default'>Retour</a>";

  include 'footer.php';

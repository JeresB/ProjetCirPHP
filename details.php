<?php

  include 'loginBDD.php';
  include 'header.php';

  echo "<div class='container'>
        <div class='page-header'>
          <h1>Détail de l'étudiant <small>Back office</small></h1>
        </div>";

  $nom = htmlspecialchars($_POST['nom']);
  $prenom = htmlspecialchars($_POST['prenom']);

  $requete = "SELECT * FROM etudiant WHERE nom = :nom AND prenom = :prenom";
  $query = $pdo->prepare($requete);
  $query->bindParam(":nom", $nom, PDO::PARAM_STR, 20);
  $query->bindParam(":prenom", $prenom, PDO::PARAM_STR, 20);
  $query->execute();
  $row = $query->fetch();

  echo  "<strong>Mail :</strong> ".$row["mail"]."<br>
        <strong>Nom :</strong> ".$row["nom"]."<br>
        <strong>Prenom :</strong> ".$row["prenom"]."<br>
        <strong>Date de naissance :</strong> ".$row["date_naissance"]."<br>
        <strong>Section :</strong> ".$row["section"]."<br><br>";

  echo  "<form action='modifier.php' method='post'>
          <input type='hidden' name='nom' value='".$row['nom']."' />
          <input type='hidden' name='prenom' value='".$row['prenom']."' />
          <input class='btn btn-default' type='submit' value='Modifier' />
        </form>
          <form action='supprimer.php' method='post'>
          <input type='hidden' name='nom' value='".$row['nom']."' />
          <input type='hidden' name='prenom' value='".$row['prenom']."' />
          <input class='btn btn-default' type='submit' value='Supprimer' />
        </form>";

  echo "<a href = 'etudiants.php' class='btn btn-default'>Retour</a>";

  include 'footer.php';
